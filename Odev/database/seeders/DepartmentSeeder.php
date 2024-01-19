<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departments::create([
            'kadro_adi_kisaltma' => 'MEM-YÖN',
            'kadro_adi' => 'Memur',
            'görev_unvani' => 'Yönetici',
        ]);
        Departments::create([
            'kadro_adi_kisaltma' => 'İŞ-GÜV',
            'kadro_adi' => 'İşçi',
            'görev_unvani' => 'Güvenlik',
        ]);

        Departments::create([
            'kadro_adi_kisaltma' => 'MEM-GÜV',
            'kadro_adi' => 'Memur',
            'görev_unvani' => 'Güvenlik',
        ]);

        Departments::create([
            'kadro_adi_kisaltma' => 'İŞ-OP',
            'kadro_adi' => 'İşçi',
            'görev_unvani' => 'Operatör',
        ]);

        Departments::create([
            'kadro_adi_kisaltma' => 'MEM-PER.UZ.',
            'kadro_adi' => 'Memur',
            'görev_unvani' => 'Personel Uzmanı',
        ]);
    }
}
