<?php

namespace App\Exports;

use App\Models\KarangTaruna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KarangTarunaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KarangTaruna::all()->map(function($karangTaruna, $index){
            return [
                'No' => $index + 1,
                'Nama' => $karangTaruna->nama,
                'Alamat' => $karangTaruna->alamat,
                'RT' => $karangTaruna->rt,
                'RW' => $karangTaruna->rw,
                'No HP' => $karangTaruna->no_hp,
            ];
        }); 
    }

    public function headings(): array
    {
        return [
            'NO',
            'Nama Karang Taruna',
            'Alamat',
            'RT',
            'RW',
            'No HP',
        ];
    }
}
