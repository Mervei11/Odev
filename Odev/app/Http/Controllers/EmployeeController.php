<?php

namespace App\Http\Controllers;

//? Özelleştirilmiş Reqyest Dosyaları
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;

//? Veritatabanı tabloları
use App\Models\Employees;
use App\Models\Departments;
use App\Models\Shifts;

//? Laravel Kütüphaneleri
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    private function generateSicilNo()
    {
        // Sicil numarası genellikle bir belirli uzunluktadır
        $length = 8;

        // Belirli bir uzunluktaki rastgele sayıyı üreten bir fonksiyon kullanabilirsiniz
        $randomNumber = mt_rand(pow(10, $length - 1), pow(10, $length) - 1);

        // Üretilen sayıyı string formatına çevirin ve geri döndürün
        return strval($randomNumber);
    }

    public function index()
    {
        //Personel ve Departman tablosundaki verileri personel sayfasına gönderir
        $employees = Employees::all();
        $departments = Departments::all();
        return view("employee", compact("employees","departments"));
    }

    public function create(EmployeeRequest $request)
    {

        // Yeni bir Employees nesnesi oluşturuluyor
        $employee = new Employees();

        // Otomatik sicil_no oluşturuluyor
        $employee->sicil_no = $this->generateSicilNo();

        // Diğer verileri request'ten alıyoruz
        $employee->departman_adi = $request->departman_adi;
        $employee->ad_soyad = $request->name;
        $employee->kimlik_no = $request->kimlik_no;
        $employee->adres = $request->adres;
        $employee->telefon = $request->phone;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);

        $employee->izin_gün_1 = $request->izin_gün_1;
        $employee->izin_gün_2 = $request->izin_gün_2;
        $employee->yetki = $request->yetki;



        // Veriyi veritabanına kaydetme
        $employee->save();

        //Başarılı olduğunda mesaj basmaya yarar
        session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla Personel eklendi']);
        //Sayfaya geri yönlendirir
        return redirect('/employees');
    }


    public function show(string $id)
    {
        //sicil numarası ile eşleşen verileri bul
        $employee = Employees::where('sicil_no', $id)->first();

        // Eğer belirtilen sicil numarasına sahip çalışan bulunamazsa, 404 hatası döndür
        if (!$employee) {
            abort(404);
        }

        // Personele ait vardiyaları bul
        $shifts = Shifts::where('sicil', $id)->get();

        //Personele ait personel verilerini ve vardiya verilerini personel profil sayfasına yönlendir
        return view('employee_show', compact('employee', 'shifts'));
    }


    public function update(EmployeeUpdateRequest $request, string $id)
    {
        //id ye ait olan verileri günceller
        $employee = Employees::find($id);


        if (!$employee) {
            return back()->with("error", "Çalışan bulunamadı");
        }

        // Diğer verileri request'ten alıyoruz
        $employee->departman_adi = $request->departman_adi;
        $employee->ad_soyad = $request->name;
        $employee->email = $request->email;
        $employee->kimlik_no = $request->kimlik_no;
        $employee->adres = $request->adres;
        $employee->telefon = $request->phone;
        $employee->izin_gün_1 = $request->izin_gün_1;
        $employee->izin_gün_2 = $request->izin_gün_2;

        if ($request->has('password') && !empty($request->password)) {
            $employee->password = Hash::make($request->password);
        }

        $employee->save();

        //Başarılı olduğunda mesaj basmaya yarar
        session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla Personel güncellendi']);
        //Sayfaya geri yönlendirir
        return redirect('/employees');
    }


    public function destroy(string $id)
    {
        try {
            //id ye ait verileri siler bulamazsa hata verir
            //sildikten sonra ise sayfayı yeniler
            $employees = Employees::findOrFail($id);

            $employees->delete();
            //Başarılı durumunda yapılacak işlemler
            return response()->json(['message' => 'Veri başarıyla kaldırıldı'], 200);
        } catch (\Exception $e) {
            // Hata durumunda yapılacak işlemler
            return response()->json(['message' => 'Veri kaldırma işlemi başarısız oldu'], 500);
        }
    }


}
