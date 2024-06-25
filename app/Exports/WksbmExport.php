<?php

namespace App\Exports;

use App\Models\wksbm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WksbmExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return wksbm::all()->map(function($wksbm, $index){
            return [
                'no' => $index + 1,
                'nama' => $wksbm->nama,
                'alamat' => $wksbm->alamat,
                'rt' => $wksbm->rt,
                'rw' => $wksbm->rw,
                'no_hp' => $wksbm->no_hp,
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
