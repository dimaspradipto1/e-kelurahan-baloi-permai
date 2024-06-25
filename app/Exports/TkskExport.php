<?php

namespace App\Exports;

use App\Models\Tksk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TkskExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tksk::all()->map(function($tksk, $index){
            return [
                'no' => $index + 1,
                'nama' => $tksk->nama,
                'alamat' => $tksk->alamat,
                'rt' => $tksk->rt,
                'rw' => $tksk->rw,
                'no_hp' => $tksk->no_hp,
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
