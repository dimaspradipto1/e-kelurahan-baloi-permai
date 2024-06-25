<?php

namespace App\Exports;

use App\Models\Posyandu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PosyanduExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Posyandu::all()->map(function($posyandu, $index){
            return [
                'No' => $index + 1,
                'Nama' => $posyandu->nama,
                'Alamat' => $posyandu->alamat,
                'RT' => $posyandu->rt,
                'RW' => $posyandu->rw,
                'No HP' => $posyandu->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NO',
            'Nama',
            'Alamat',
            'RT',
            'RW',
            'No HP',
        ];
    }
}
