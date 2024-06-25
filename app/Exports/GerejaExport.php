<?php

namespace App\Exports;

use App\Models\Gereja;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class GerejaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gereja::all()->map(function($gereja, $index){
            return [
                'no' => $index + 1,
                'dokumen legalitas' => $gereja->dokumen_legalitas,
                'nama' => $gereja->nama,
                'alamat' => $gereja->alamat,
                'rt' => $gereja->rt,
                'rw' => $gereja->rw,
                'no hp' => $gereja->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'no',
            'dokumen legalitas',
            'nama',
            'alamat',
            'rt',
            'rw',
            'no hp',
        ];
    }
}
