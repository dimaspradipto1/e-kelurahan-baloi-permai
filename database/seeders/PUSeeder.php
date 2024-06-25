<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pelayanan Umum',
            'email' => 'pu@gmail.com',
            'roles' => 'PU',
            'password' => bcrypt('pu123'),

        ]);
    }
}