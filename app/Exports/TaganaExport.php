<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Tagana;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TaganaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tagana::all()->map(function($tagana){
            $tanggal_lahir = Carbon::parse($tagana->tanggal_lahir)->translatedFormat('d/m/Y');
            
            return [
                'nama' => $tagana->nama,
                'nik' => '\''.$tagana->nik,
                'kk' => '\''.$tagana->kk,
                'jenis_kelamin' => $tagana->jenis_kelamin,
                'tempat_lahir' => $tagana->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $tagana->agama,
                'alamat' => $tagana->alamat,
                'rt' => $tagana->rt,
                'rw' => $tagana->rw,
                'no_hp' => $tagana->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIK',
            'KK',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Alamat',
            'RT',
            'RW',
            'No HP',
        ];
    }
}
