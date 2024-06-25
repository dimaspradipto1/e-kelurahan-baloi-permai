<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Pendatang;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendatangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendatang::with('warga')->get()->map(function ($pendatang, $index) {
            return [
                'id'=> $index + 1,
                'nik' => $pendatang->nik,
                'warga' => $pendatang->warga,
                'alamat_asal' => $pendatang->alamat_asal,
                'kelurahan' => $pendatang->kelurahan,
                'kecamatan' => $pendatang->kecamatan,
                'alamat_tujuan' => $pendatang->alamat_tujuan,
                'rt' => $pendatang->rt,
                'rw' => $pendatang->rw,
                'tanggal_datang' => Carbon::parse($pendatang->tanggal_datang)->format('d/m/Y'),

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
            'Kelurahan',
            'Kecamatan',
            'Alamat Tujuan',
            'RT',
            'RW',
            'Tanggal Datang'
        ];
    }
}
