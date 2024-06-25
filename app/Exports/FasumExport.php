<?php

namespace App\Exports;

use App\Models\Fasum;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FasumExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fasum::all()->map(function($fasum, $index){
            return [
                'no' => $index + 1,
                'dokumen legalitas' => $fasum->dokumen_legalitas,
                'nama' => $fasum->nama,
                'alamat' => $fasum->alamat,
                'rt' => $fasum->rt,
                'rw' => $fasum->rw,
                'no hp' => $fasum->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Dokumen Legaitas',
            'Nama',
            'Alamat',
            'RT',
            'RW',
            'No HP',
        ];
    }
}
