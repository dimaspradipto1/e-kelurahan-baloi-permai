<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\PindahWilayah;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PindahWilayahExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         
        return PindahWilayah::with('warga')->get()->map(function($pindahWilayah, $index) {
            return [
                'id' => $index + 1,
                'nik' => $pindahWilayah->nik,
                'warga' => $pindahWilayah->warga,
                'alamat_asal' => $pindahWilayah->alamat_asal,
                'rt' => $pindahWilayah->rt,
                'rw' => $pindahWilayah->rw,
                'rt_tujuan' => $pindahWilayah->rt_tujuan,
                'rw_tujuan' => $pindahWilayah->rw_tujuan,
                'alamat_tujuan' => $pindahWilayah->alamat_tujuan,
                'tanggal_pindah' => Carbon::parse($pindahWilayah->tanggal_pindah)->format('d/m/Y'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'no',
            'nik',
            'warga',
            'alamat_asal',
            'rt',
            'rw',
            'rt tujuan',
            'rw tujuan',
            'alamat tujuan',
            'tanggal pindah',
        ];
    }
}
