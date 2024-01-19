<?php
// app/Http/Controllers/ShiftController.php

namespace App\Http\Controllers;

//? VeriTabanı tabloları
use App\Models\Employees;
use App\Models\Off_days;
use App\Models\Shifts;

//? Veritabanı tabloları
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    private $vardiyaA = 0;
    private $vardiyaB = 0;
    private $vardiyaC = 0;

    public function otomatik_vardiya(Request $request)
    {
        // Formdan gelen verileri al
        $personelSayisi = $request->input('personel_count');
        $secilenLokasyon = $request->input('bölge');

        // Başlangıç ve bitiş tarihlerini al
        $baslangicTarihi = Carbon::parse($request->input('start_date'));
        $bitisTarihi = Carbon::parse($request->input('end_date'));

        // Sabit vardiya saatleri
        $kampus = ["00:00-08:00", "08:00-16:00", "16:00-24:00"];
        $kampus2 = ["08:00-16:00", "09:00-17:00"];



        // Tarih farkını hesapla
        $gunFarki = $bitisTarihi->diffInDays($baslangicTarihi);

        //Admin olmayan personellerin sicil_no larını array olarak listeler
        $işcisicil = DB::table('employees')
        ->where('yekti', '!=', 'Admin')
        ->pluck('sicil_no')
        ->toArray();


        // Tarih aralığında döngü
        for ($i = 0; $i < $gunFarki + 1; $i++)
        {
            $days = $baslangicTarihi->copy()->addDays($i);

            // Atanan personel sayısını takip etmek için
            $toplamAtananPersonelSayisi = 0;

            // Eğer personel varsa ve toplam atanan personel sayısı hedeflenen sayıya ulaşmamışsa
            if (!empty($işcisicil) && $toplamAtananPersonelSayisi < $personelSayisi)
            {
                foreach ($işcisicil as $sicil)
                {
                    // İzin kontrolü
                    if ($this->izinSorgulama($sicil, $days))
                    {
                        // Vardiya ataması yap
                        $this->vardiyaAta($sicil, $days, $secilenLokasyon, $kampus, $kampus2);
                        $toplamAtananPersonelSayisi++;

                        // Eğer hedeflenen personel sayısına ulaşıldıysa döngüyü kır
                        if ($toplamAtananPersonelSayisi >= $personelSayisi) {
                            break;
                        }
                    }
                }
            }
        }

        session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla haftalık vardiya oluşturuldu']);
        return redirect('/shifts');
    }





    private function vardiyaAta($sicil, $days, $lokasyon, $kampus, $kampus2)
    {

        $saat = " ";
        $bölge = $lokasyon;

        $kampus = ["00:00-08:00", "08:00-16:00", "16:00-24:00"];
        $kampus2 = ["08:00-16:00", "09:00-17:00"];

        // Aynı gün için daha önce yapılan atamaları getir
        $oncekiAtamalar = Shifts::where('Sicil', $sicil)
            ->where('Gün', $days)
            ->get();

        // Aynı gün içinde farklı lokasyonlara yapılan atama var mı kontrol et
        $ayniGunFarkliLokasyonAtamaVar = $oncekiAtamalar->contains('Bölge', '=', $lokasyon);

        // Eğer aynı gün içinde farklı lokasyonlara atama yapılmamışsa devam et
        if (!$ayniGunFarkliLokasyonAtamaVar) {
            // Aynı gün ve lokasyon için daha önce atama yapılmış mı kontrolü
            $varmi = $oncekiAtamalar->contains('Bölge', $lokasyon);


            if (!$varmi) {
                if ($lokasyon == "Kampus Disi") {
                    $saat = $this->getMinVardiye($this->vardiyaA, $this->vardiyaB, $this->vardiyaC,  $bölge);
                    $this->vardiyaA++;
                } elseif ($lokasyon == "Kampus İci") {
                    $saat = $this->getMinVardiye($this->vardiyaA, $this->vardiyaB, $this->vardiyaC,  $bölge);
                    $this->vardiyaC++;
                }

                // Vardiya kaydı
                $this->vardiyaKaydet($sicil, $days, $saat, $bölge);
            }
        }
    }


    private function vardiyaKaydet($sicil, $days, $saat, $bölge)
    {
        $vardiya_kayit = new Shifts;
        $vardiya_kayit->Sicil = $sicil;
        $vardiya_kayit->Gün = $days;
        $vardiya_kayit->Saat = $saat;
        $vardiya_kayit->Bölge = $bölge;
        $vardiya_kayit->save();
    }

    private function getMinVardiye(&$vardiyaA, &$vardiyaB, &$vardiyaC, $bölge)
    {

        $kampus = ["00:00-08:00", "08:00-16:00", "16:00-24:00"];
        $kampus2 = ["08:00-16:00", "09:00-17:00"];
        if ($bölge == "Kampus Disi") {
            $enKucukVardiye = min($vardiyaA, $vardiyaB, $vardiyaC);

            if ($enKucukVardiye == $vardiyaA) {
                $vardiyaA++;
                return $kampus[0];
            } elseif ($enKucukVardiye == $vardiyaB) {
                $vardiyaB++;
                return $kampus[1];
            } elseif ($enKucukVardiye == $vardiyaC) {
                $vardiyaC++;
                return $kampus[2];
            }
        } elseif ($bölge == "Kampus İci") {
            $enKucukVardiye = min($vardiyaA, $vardiyaB);

            if ($enKucukVardiye == $vardiyaA) {
                $vardiyaA++;
                return $kampus2[0];
            } elseif ($enKucukVardiye == $vardiyaB) {
                $vardiyaB++;
                return $kampus2[1];
            }
        }

        return " ";
    }




    public function getSicilList()
    {
        $personelSicil = Employees::pluck('sicil_no')->toArray();

        return $personelSicil;
    }

    public function izinSorgulama($sicilNo, $tarih)
    {
        $izinSayisi = Off_days::where('izin_personel_sicil_no', $sicilNo)
        ->whereDate('izin_tarihi', $tarih)
        ->count();


        if ($izinSayisi == 0)
        {
            // vardiya_kayit tablosundan bu personelin kaç vardiyası olduğunu kontrol et
            $izinSayisiVardiya = DB::table('shifts')
                ->where('Sicil', $sicilNo)
                ->where('Gün', $tarih)
                ->count();


            // O gün vardiyası yoksa çalışır
            if ($izinSayisiVardiya == 0)
            {
                $gunAdi = Carbon::parse($tarih)->dayName;

                $personelIzinGun1 = Employees::where('sicil_no', $sicilNo)
                    ->value('izin_gün_1');

                $personelIzinGun2 = Employees::where('sicil_no', $sicilNo)
                ->value('izin_gün_2');

                // Eğer her iki izin günü de null ise true döndür
                if ($personelIzinGun1 == $gunAdi || $personelIzinGun2 == $gunAdi)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
        }

        return false;
    }







    public function index()
    {
        $shifts = Shifts::with('employee')->get();

        $employees = Employees::all();

        // View'e verileri gönderiyoruz
        return view('shift', compact('shifts', 'employees'));
    }


    public function create(Request $request)
    {
        // Yeni bir Shifs nesnesi oluşturuluyor
        $shifts = new Shifts();
        // Diğer verileri request'ten alıyoruz
        $shifts->sicil = $request->employee_sicil_no;
        $shifts->gün = $request->gün;
        $shifts->saat = $request->saat;
        $shifts->bölge = $request->bölge;

        // Veriyi veritabanına kaydetme
        $shifts->save();



        //Başarılı olduğunda mesaj basmaya yarar
        session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla Personel eklendi']);
        //Sayfaya geri yönlendirir
        return redirect('/shifts');
    }


    public function update(Request $request, $id)
    {
        // İlgili Shifts kaydını bul
        $shift = Shifts::find($id);

        // Shifts kaydı bulunamazsa hata mesajı döndür
        if (!$shift) {
            session()->flash('toastr', ['type' => 'error', 'message' => 'Güncellenecek kayıt bulunamadı']);
            return redirect('/shifts');
        }

        // Shifts kaydını güncelle
        $shift->update([
            'sicil' => $request->input('employee_sicil_no'),
            'gün' => $request->input('gün'),
            'saat' => $request->input('saat'),
            'bölge' => $request->input('bölge'),
        ]);

        // Başarı mesajı
        session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla güncellendi']);
        return redirect('/shifts');
    }



    public function destroy(string $id)
    {
        try {
            $shift = Shifts::findOrFail($id);

            $shift->delete();
            return response()->json(['message' => 'Veri başarıyla kaldırıldı'], 200);
        } catch (\Exception $e) {
            // Hata durumunda yapılacak işlemler
            return response()->json(['message' => 'Veri kaldırma işlemi başarısız oldu'], 500);
        }
    }

    public function destroyAll()
    {
        try {

            Shifts::truncate();

            session()->flash('toastr', ['type' => 'success', 'message' => 'Başarıyla Tüm Vardiyalar silindi']);
            return redirect('/shifts');
        } catch (\Exception $e) {
            // Hata durumunda yapılacak işlemler
            session()->flash('toastr', ['type' => 'warning', 'message' => 'Veri kaldırma işlemi başarısız oldu']);
            return redirect('/shifts');
        }
    }




}
