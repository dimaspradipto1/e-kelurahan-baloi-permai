<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PMKSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Penyandang Masalah Kesejahteraan Sosial',
            'email' => 'pmks@gmail.com',
            'password' => bcrypt('pmks'),
            'roles' => 'PMKS',
        ]);
    }
}
