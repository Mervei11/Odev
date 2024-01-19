<?php

namespace Database\Seeders;

use App\Models\Shifts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-15 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '37990225',
            'gün' => '2024-01-15 00:00:00',
            'saat' => '08:00-16:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '47990225',
            'gün' => '2024-01-15 00:00:00',
            'saat' => '16:00-24:00',
            'bölge' => 'Kampus Disi',
        ]);        Shifts::create([
            'sicil' => '51751296',
            'gün' => '2024-01-15 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus İçi',
        ]);        Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-15 00:00:00',
            'saat' => '09:00-17:00',
            'bölge' => 'Kampus içi',
        ]);  Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-16 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-16 00:00:00',
            'saat' => '09:00-17:00',
            'bölge' => 'Kampus içi',
        ]);
        Shifts::create([
            'sicil' => '37990225',
            'gün' => '2024-01-16 00:00:00',
            'saat' => '08:00-16:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '47990225',
            'gün' => '2024-01-16 00:00:00',
            'saat' => '16:00-24:00',
            'bölge' => 'Kampus Disi',
        ]);        Shifts::create([
            'sicil' => '51751296',
            'gün' => '2024-01-16 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus İçi',
        ]);        Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-16 00:00:00',
            'saat' => '09:00-17:00',
            'bölge' => 'Kampus içi',
        ]);  Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-17 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus Disi',
        ]);

        Shifts::create([
            'sicil' => '37990225',
            'gün' => '2024-01-17 00:00:00',
            'saat' => '08:00-16:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '47990225',
            'gün' => '2024-01-17 00:00:00',
            'saat' => '16:00-24:00',
            'bölge' => 'Kampus Disi',
        ]);        Shifts::create([
            'sicil' => '51751296',
            'gün' => '2024-01-17 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus İçi',
        ]);        Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-18 00:00:00',
            'saat' => '09:00-17:00',
            'bölge' => 'Kampus içi',
        ]);  Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-18 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '37990225',
            'gün' => '2024-01-18 00:00:00',
            'saat' => '08:00-16:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '47990225',
            'gün' => '2024-01-18 00:00:00',
            'saat' => '16:00-24:00',
            'bölge' => 'Kampus Disi',
        ]);        Shifts::create([
            'sicil' => '51751296',
            'gün' => '2024-01-18 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus İçi',
        ]);        Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-19 00:00:00',
            'saat' => '09:00-17:00',
            'bölge' => 'Kampus içi',
        ]);  Shifts::create([
            'sicil' => '17990322',
            'gün' => '2024-01-19 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '37990225',
            'gün' => '2024-01-19 00:00:00',
            'saat' => '08:00-16:00',
            'bölge' => 'Kampus Disi',
        ]);
        Shifts::create([
            'sicil' => '47990225',
            'gün' => '2024-01-19 00:00:00',
            'saat' => '16:00-24:00',
            'bölge' => 'Kampus Disi',
        ]);        Shifts::create([
            'sicil' => '51751296',
            'gün' => '2024-01-19 00:00:00',
            'saat' => '00:00-08:00',
            'bölge' => 'Kampus İçi',
        ]);
    }
}
