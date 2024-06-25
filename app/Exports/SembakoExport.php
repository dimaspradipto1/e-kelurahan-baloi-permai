<?php

namespace App\Exports;

use App\Models\Sembako;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SembakoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Sembako::all()->map(function ($sembako, $index) {
            return [
                'id'=> $index + 1,
                'nama' => $sembako->nama,
                'nik' =>"'".$sembako->nik,
                'kk' => "'".$sembako->kk,
                'alamat' => $sembako->alamat,
                'rt' => $sembako->rt,
                'rw' => $sembako->rw,
                'no_hp' => $sembako->no_hp,
                'tahap' =>$sembako->tahap,
                'tahun' =>$sembako->tahun
            ];
        });

    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NIK',
            'KK',
            'Alamat',
            'RT',
            'RW',
            'Nomor Handphone',
            'Tahap',
            'Tahun'
        ];
    }
}
