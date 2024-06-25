<?php

namespace Database\Seeders;

use App\Models\RT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['rt' => '001'],
            ['rt' => '002'],
            ['rt' => '003'],
            ['rt' => '004'],
            ['rt' => '005'],
            ['rt' => '006'],
            ['rt' => '007'],
            ['rt' => '008'],
            ['rt' => '009'],
        ];

        foreach($data as $value){
            RT::insert([
                'rt' => $value['rt'],
                'created_at' =>now(),
                'updated_at' => now(),
            ]);
        }
    }
}
