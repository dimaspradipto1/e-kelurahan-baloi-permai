<?php

namespace App\Exports;

use App\Models\DuniaUsaha;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DuniaUsahaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DuniaUsaha::all()->map(function($duniausaha, $index){
            return [
                'id' => $index + 1,
                'nama_usaha' => $duniausaha->nama_usaha,
                'alamat' => $duniausaha->alamat,
                'rt' => $duniausaha->rt,
                'rw' => $duniausaha->rw,
                'no_hp' => $duniausaha->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Usaha',
            'Alamat',
            'RT',
            'RW',
            'No HP',
        ];
    }
}
