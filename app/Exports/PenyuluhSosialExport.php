<?php

namespace App\Exports;

use App\Models\PenyuluhSosial;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenyuluhSosialExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenyuluhSosial::all()->map(function($penyuluhsosial, $index){
            return 
            [
                'id' => $index + 1,
                'nama_lembaga' => $penyuluhsosial->nama_lembaga,
                'alamat' => $penyuluhsosial->alamat,
                'rt' => $penyuluhsosial->rt,
                'rw' => $penyuluhsosial->rw,
                'no_hp' => $penyuluhsosial->no_hp,
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
