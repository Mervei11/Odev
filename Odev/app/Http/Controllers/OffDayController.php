<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//? Özelleştirilmiş Reqyest Dosyaları
use App\Http\Requests\OffDayRequest;
use App\Http\Requests\OffDayUpdateRequest;

//? Veritatabanı tabloları
use App\Models\Employees;
use App\Models\Off_days;

class OffDayController extends Controller
{

    public function index()
    {
        // Personelin ad, soyad, sicil no'su ve izinler tablosundaki verileri izinler sayfasına gönderir
        $employeeSicilNolar = Employees::all(['sicil_no', 'ad_soyad'])->pluck('ad_soyad', 'sicil_no');
        $off_days = Off_days::all();
        return view("off_day", compact("employeeSicilNolar", "off_days"));
    }

    public function create(Request $request)
    {
        // Yeni bir Off Days nesnesi oluşturuluyor
        $off_day = new Off_days();

        // Diğer verileri request'ten alıyoruz
        $off_day->izin_personel_sicil_no = $request->personel_sicil_no;
        $employees = Employees::where('sicil_no', $off_day->izin_personel_sicil_no)->first();
        $off_day->izin_personel_ad_soyad = $employees->ad_soyad;
        $off_day->izin_tarihi = $request->izin_tarihi;
        $off_day->izin_türü = $request->izin_türü;
        $off_day->izin_aciklama = $request->aciklama;

        // Veriyi veritabanına kaydetme
        $off_day->save();

        // Başarılı olduğunda mesaj basmaya yarar
        session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla İzin Günü eklendi']);
        // Sayfaya geri yönlendirir
        return redirect('/off_days');
    }

    public function show(string $id)
    {
        $employee = Employees::find($id);
        // Gerekirse gösterim sayfasını döndür
        return view('employee.show', compact('employee'));
    }

    public function update(Request $request, string $id)
    {
        $off_day = Off_days::find($id);

        if (!$off_day) {
            return back()->with("error", "İzin günü bulunamadı");
        }

        $off_day->izin_personel_sicil_no = $request->personel_sicil_no;

        $employees = Employees::where('sicil_no', $off_day->izin_personel_sicil_no)->first();

        $off_day->izin_personel_ad_soyad = $employees->ad_soyad;
        $off_day->izin_tarihi = $request->izin_tarihi;
        $off_day->izin_türü = $request->izin_türü;
        $off_day->izin_aciklama = $request->aciklama;

        $off_day->save();

        $notification = array(
            'message' => 'Başarıyla güncellendi',
            'alert-type' => 'success'
        );
        return redirect('/off_days')->with($notification);
    }

    public function destroy(string $id)
    {
        try {
            $off_day = Off_days::findOrFail($id);

            $off_day->delete();
            return response()->json(['message' => 'Veri başarıyla kaldırıldı'], 200);
        } catch (\Exception $e) {
            // Hata durumunda yapılacak işlemler
            return response()->json(['message' => 'Veri kaldırma işlemi başarısız oldu'], 500);
        }
    }

}
