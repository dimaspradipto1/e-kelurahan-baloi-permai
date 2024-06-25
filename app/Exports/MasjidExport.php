<?php

namespace App\Exports;

use App\Models\Masjid;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasjidExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Masjid::all()->map(function($masjid, $index){
            return [
                'no' => $index + 1,
                'dokumen legalitas' => $masjid->dokumen_legalitas,
                'nama' => $masjid->nama,
                'alamat' => $masjid->alamat,
                'rt' => $masjid->rt,
                'rw' => $masjid->rw,
                'no hp' => $masjid->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'no',
            'dokumen legalitas',
            'nama',
            'alamat',
            'rt',
            'rw',
            'no hp',
        ];
    }
}
