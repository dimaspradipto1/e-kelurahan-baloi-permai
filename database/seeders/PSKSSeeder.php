<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PSKSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' =>'Potensi dan Sumber Kesejahteraan Sosial',
            'email' => 'psks@gmail.com',
            'password' => bcrypt('psks'),
            'roles' => 'PSKS',
        ]);
    }
}
