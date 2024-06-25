<?php

namespace App\Exports;

use App\Models\PantiAsuhan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PantiAsuhanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PantiAsuhan::all()->map(function($panti, $index){
            return [
                'no' => $index + 1,
                'nama' => $panti->nama,
                'alamat' => $panti->alamat,
                'rt' => $panti->rt,
                'rw' => $panti->rw,
                'no_hp' => $panti->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Alamat',
            'RT',
            'RW',
            'No HP',
        ];
    }
}
