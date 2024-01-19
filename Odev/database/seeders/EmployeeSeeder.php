<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::create([
            'sicil_no' => '17990322',
            'departman_adi' => '1',
            'ad_soyad' => 'Admin',
            'kimlik_no' => '51979208034',
            'adres' => 'admin_adresi',
            'telefon' => '+905551882089',
            'email' => 'admin@gmail.com',
            'password' => 'admin.123',
            'yetki' => 'Admin',
            'izin_gün_1' => 'Cumartesi',
            'izin_gün_2' => 'Pazar',
            'updated_at' => now()
        ]);


        Employees::create([
            'sicil_no' => '17990225',
            'departman_adi' => '2',
            'ad_soyad' => 'Personel_1',
            'kimlik_no' => '11979208231',
            'adres' => 'personel_adresi_1',
            'telefon' => '+905231723082',
            'email' => 'employee@gmail.com',
            'password' => 'employee.123',
            'yetki' => 'Personel',
            'izin_gün_1' => 'Cumartesi',
            'izin_gün_2' => 'Pazar',
            'updated_at' => now()
        ]);

        Employees::create([
            'sicil_no' => '22990225',
            'departman_adi' => '2',
            'ad_soyad' => 'Personel_2',
            'kimlik_no' => '21979208231',
            'adres' => 'personel_adresi_2',
            'telefon' => '+905131723082',
            'email' => 'employee2@gmail.com',
            'password' => 'employee2.123',
            'yetki' => 'Personel',
            'izin_gün_1' => 'Cumartesi',
            'izin_gün_2' => 'Pazar',
            'updated_at' => now()
        ]);

        Employees::create([
            'sicil_no' => '37990225',
            'departman_adi' => '2',
            'ad_soyad' => 'Personel_3',
            'kimlik_no' => '31979208231',
            'adres' => 'personel_adresi_3',
            'telefon' => '+905331723082',
            'email' => 'employee3@gmail.com',
            'password' => 'employee3.123',
            'yetki' => 'Personel',
            'izin_gün_1' => 'Cumartesi',
            'izin_gün_2' => 'Pazar',
            'updated_at' => now()
        ]);

        Employees::create([
            'sicil_no' => '47990225',
            'departman_adi' => '2',
            'ad_soyad' => 'Personel_4',
            'kimlik_no' => '41979208231',
            'adres' => 'personel_adresi_4',
            'telefon' => '+905431723082',
            'email' => 'employee4@gmail.com',
            'password' => 'employee4.123',
            'yetki' => 'Personel',
            'izin_gün_1' => 'Cumartesi',
            'izin_gün_2' => 'Pazar',
            'updated_at' => now()
        ]);

        Employees::create([
            'sicil_no' => '57990225',
            'departman_adi' => '2',
            'ad_soyad' => 'Personel_5',
            'kimlik_no' => '55979208231',
            'adres' => 'personel_adresi_5',
            'telefon' => '+905531723082',
            'email' => 'employee5@gmail.com',
            'password' => 'employee5.123',
            'yetki' => 'Personel',
            'izin_gün_1' => 'Cumartesi',
            'izin_gün_2' => 'Pazar',
            'updated_at' => now()
        ]);

    }
}
