<?php

namespace App\Exports;

use App\Models\Pindah;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PindahExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pindah::with('warga')->get()->map(function ($pindah, $index) {
            return [
                'id'=> $index + 1,
                'nik' => $pindah->nik,
                'warga' => $pindah->warga,
                'alamat_asal' => $pindah->alamat_asal,
                'rt' => $pindah->rt,
                'rw' => $pindah->rw,
                'alamat_tujuan' => $pindah->alamat_tujuan,
                'kelurahan' => $pindah->kelurahan,
                'kecamatan' => $pindah->kecamatan,
                'created_at' => $pindah->created_at->format('d/m/Y'),

            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'nik',
            'Nama Warga',
            'Alamat Asal',
            'RT',
            'RW',
            'Alamat Tujuan',
            'Kelurahan',
            'Kecamatan',
            'Tanggal Pindah'
        ];
    }
}
