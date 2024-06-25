<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kecamatan' => 'Batam Kota'],
            ['kecamatan' => 'Batu Aji'],
            ['kecamatan' => 'Batu Ampar'],
            ['kecamatan' => 'Belakang Padang'],
            ['kecamatan' => 'Bengkong'],
            ['kecamatan' => 'Bulang'],
            ['kecamatan' => 'Galang'],
            ['kecamatan' => 'Lubuk Baja'],
            ['kecamatan' => 'Nongsa'],
            ['kecamatan' => 'Sagulung'],
            ['kecamatan' => 'Sei Beduk'],
            ['kecamatan' => 'Sekupang'],
        ];

        foreach($data as $value){
            Kecamatan::insert([
                'kecamatan' => $value['kecamatan'],
                'created_at' =>now(),
                'updated_at' => now(),
            ]);
        }
    }
}
