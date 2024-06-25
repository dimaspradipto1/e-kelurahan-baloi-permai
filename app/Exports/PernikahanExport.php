<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Pernikahan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PernikahanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pernikahan::all()->map(function($pernikahan){
            return [
                'no_surat' => $pernikahan->no_surat,
                'tanggal_surat' => Carbon::parse ($pernikahan->tanggal_surat)->format('d/m/Y'),
                'nama' => $pernikahan->nama,
                'nik' => "'". $pernikahan->nik,
                'alamat' => $pernikahan->alamat,
                'rt' => $pernikahan->rt,
                'rw' => $pernikahan->rw,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No Surat',
            'Tanggal Surat',
            'Nama',
            'NIK',
            'Alamat',
            'RT',
            'RW',
        ];
    }
}
