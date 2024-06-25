<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            ['kelurahan' => 'Baloi Permai'],
            ['kelurahan' => 'Belian'],
            ['kelurahan' => 'Sukajadi'],
            ['kelurahan' => 'Sungai Panas'],
            ['kelurahan' => 'Taman Baloi'],
            ['kelurahan' => 'Teluk Tering'],
            ['kelurahan' => 'Bukit Tempayang'],
            ['kelurahan' => 'Buliang'],
            ['kelurahan' => 'Kibing'],
            ['kelurahan' => 'Tanjung Uncang'],
            ['kelurahan' => 'Batu Merah'],
            ['kelurahan' => 'kampung Seraya'],
            ['kelurahan' => 'Sungai Jodoh'],
            ['kelurahan' => 'Tanjung Sengkuang'],
            ['kelurahan' => 'Kasu'],
            ['kelurahan' => 'Pecong'],
            ['kelurahan' => 'Pemping'],
            ['kelurahan' => 'Pulau Terong'],
            ['kelurahan' => 'Sekanak Raya'],
            ['kelurahan' => 'Tanjung Sari'],
            ['kelurahan' => 'Bengkong Indah'],
            ['kelurahan' => 'Bengkong Laut'],
            ['kelurahan' => 'Sadai'],
            ['kelurahan' => 'Tanjung Buntung'],
            ['kelurahan' => 'Batu Legong'],
            ['kelurahan' => 'Bulang Lintang'],
            ['kelurahan' => 'Pantai Gelam'],
            ['kelurahan' => 'Pulau Buluh'],
            ['kelurahan' => 'Setokok'],
            ['kelurahan' => 'Temoyong'],
            ['kelurahan' => 'Air Raja'],
            ['kelurahan' => 'Galang Baru'],
            ['kelurahan' => 'Karas'],
            ['kelurahan' => 'Pulau Abang'],
            ['kelurahan' => 'Rempang Cate'],
            ['kelurahan' => 'Sembulang'],
            ['kelurahan' => 'Sijantung'],
            ['kelurahan' => 'Subang Mas'],
            ['kelurahan' => 'Baloi Indah'],
            ['kelurahan' => 'Batu Selicin'],
            ['kelurahan' => 'Kampung Pelita'],
            ['kelurahan' => 'Lubuk Baja Kota'],
            ['kelurahan' => 'Tanjung Uma'],
            ['kelurahan' => 'Batu Besar'],
            ['kelurahan' => 'Kabil'],
            ['kelurahan' => 'Ngenang'],
            ['kelurahan' => 'Sambau'],
            ['kelurahan' => 'Sagulung Kota'],
            ['kelurahan' => 'Sungai Binti'],
            ['kelurahan' => 'Sungai Langkai'],
            ['kelurahan' => 'Sungai Lekop'],
            ['kelurahan' => 'Sungai Pelunggut'],
            ['kelurahan' => 'Tembesi'],
            ['kelurahan' => 'Duriangkang'],
            ['kelurahan' => 'Mangsang'],
            ['kelurahan' => 'Muka Kuning'],
            ['kelurahan' => 'Tanjung Piayu'],
            ['kelurahan' => 'Patam Lestari'],
            ['kelurahan' => 'Sungai Harapan'],
            ['kelurahan' => 'Tanjung Pinggir'],
            ['kelurahan' => 'Tanjung Riau'],
            ['kelurahan' => 'Tiban Baru'],
            ['kelurahan' => 'Tiban Indah'],
            ['kelurahan' => 'Tiban Lama'],

        ];

        foreach($data as $value){
            Kelurahan::insert([
                'kelurahan' => $value['kelurahan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
