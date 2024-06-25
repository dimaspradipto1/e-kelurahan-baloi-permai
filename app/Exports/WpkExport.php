<?php

namespace App\Exports;

use App\Models\Wpk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WpkExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Wpk::all()->map(function($wpk, $index){
            return [
                'no' => $index + 1,
                'nama' => $wpk->nama,
                'alamat' => $wpk->alamat,
                'rt' => $wpk->rt,
                'rw' => $wpk->rw,
                'no_hp' => $wpk->no_hp,
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
