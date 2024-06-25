<?php

namespace App\Exports;

use App\Models\Lk;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LkExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lk::all()->map(function($lk, $index){
            return [
                'id' => $index + 1,
                'nama_lembaga' => $lk->nama_lembaga,
                'alamat' => $lk->alamat,
                'rt' => $lk->rt,
                'rw' => $lk->rw,
                'no_hp' => $lk->no_hp,
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
