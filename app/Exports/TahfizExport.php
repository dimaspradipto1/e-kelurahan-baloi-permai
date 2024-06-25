<?php

namespace App\Exports;

use App\Models\tahfiz;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TahfizExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tahfiz::all()->map(function ($tahfiz, $index) {
            return [
                'No' => $index + 1,
                'Nama' => $tahfiz->nama,
                'Alamat' => $tahfiz->alamat,
                'RT' => $tahfiz->rt,
                'RW' => $tahfiz->rw,
                'No HP' => $tahfiz->no_hp,
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
