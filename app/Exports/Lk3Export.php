<?php

namespace App\Exports;

use App\Models\Lk3;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Lk3Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lk3::all()->map(function($lk3, $index){
            return 
            [
                'id' => $index + 1,
                'nama_lembaga' => $lk3->nama_lembaga,
                'alamat' => $lk3->alamat,
                'rt' => $lk3->rt,
                'rw' => $lk3->rw,
                'no_hp' => $lk3->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lembaga',
            'Alamat',
            'RT',
            'RW',
            'No HP',
        ];
    }
}
