<?php

namespace Database\Seeders;

use App\Models\RW;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['rw' => '001'],
            ['rw' => '002'],
            ['rw' => '003'],
            ['rw' => '004'],
            ['rw' => '005'],
            ['rw' => '006'],
            ['rw' => '007'],
            ['rw' => '008'],
            ['rw' => '009'],
            ['rw' => '010'],
            ['rw' => '011'],
            ['rw' => '012'],
            ['rw' => '013'],

        ];

        foreach($data as $value){
            RW::insert([
                'rw' => $value['rw'],
                'created_at' =>now(),
                'updated_at' => now(),
            ]);
        }
    }
}
