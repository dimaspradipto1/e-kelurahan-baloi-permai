<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Napza;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class NapzaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Napza::all()->map(function($napza, $index){

            $tanggal_lahir = Carbon::parse($napza->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $napza->nama,
                'nik' => '\''.$napza->nik,
                'kk' => '\''.$napza->kk,
                'jenis_kelamin' => $napza->jenis_kelamin,
                'tempat_lahir' => $napza->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $napza->agama,
                'alamat' => $napza->alamat,
                'rt' => $napza->rt,
                'rw' => $napza->rw,
                'no_hp' => $napza->no_hp,
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
