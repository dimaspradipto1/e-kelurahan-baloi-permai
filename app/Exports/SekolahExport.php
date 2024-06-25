<?php

namespace App\Exports;

use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SekolahExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sekolah::all()->map(function ($sekolah, $index){
            return [
                'id' => $index + 1,
                'nama' => $sekolah->nama,
                'alamat' => $sekolah->alamat,
                'rt' => $sekolah->rt,
                'rw' => $sekolah->rw,
                'status' => $sekolah->status,
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
            'Status',
        ];
    }
}
