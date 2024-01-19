<?php

namespace App\Http\Controllers;

//? Özelleştirilmiş Request Dosyaları
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\DepartmentUpdateRequest;

//? Veritatabanı tabloları
use App\Models\Departments;

//? Laravel Kütüphaneleri
use Illuminate\Http\Request;


class DepartmentController extends Controller
{

    public function index()
    {
        //Departman tablosundak tüm verileri department sayfasına gönderir
        $departments = Departments::all();
        return view("department", compact("departments"));
    }

    public function create(Request $request)
    {

        // Yeni bir Departman nesnesi oluşturuluyor
        $department = new Departments();

        // Diğer verileri request'ten alıyoruz
        $department->kadro_adi_kisaltma = $request->kadro_adi_kisaltma;
        $department->kadro_adi = $request->kadro_adi;
        $department->görev_unvani = $request->görev_unvani;

        $department->save();

        //Başarılı olduğunda mesaj basmaya yarar
        session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla Departman eklendi']);
        //Sayfaya geri yönlendirir
        return redirect('/departments');
    }


    public function update(DepartmentUpdateRequest $request, string $id)
    {

        //id ye ait olan verileri günceller
        $department = Departments::find($id);

        if (!$department) {
            return back()->with("error", "Departman bulunamadı");
        }

        // Diğer verileri request'ten alıyoruz
        $department->kadro_adi_kisaltma = $request->kadro_adi_kisaltma;
        $department->kadro_adi = $request->kadro_adi;
        $department->görev_unvani = $request->görev_unvani;
        $department->save();

        //Başarılı olduğunda mesaj basmaya yarar
        session()->flash('toastr', ['type' => 'success', 'message' => 'Departmant başarıyla güncellendi']);
        //Sayfaya geri yönlendirir
        return redirect('/departments');
    }




    public function destroy(string $id)
    {
        try {
            //id ye ait verileri siler bulamazsa hata verir
            //sildikten sonra ise sayfayı yeniler
            $department = Departments::findOrFail($id);

            $department->delete();
            //Başarılı durumunda yapılacak işlemler
            return response()->json(['message' => 'Veri başarıyla kaldırıldı'], 200);
        } catch (\Exception $e) {
            // Hata durumunda yapılacak işlemler
            return response()->json(['message' => 'Veri kaldırma işlemi başarısız oldu'], 500);
        }
    }


}
