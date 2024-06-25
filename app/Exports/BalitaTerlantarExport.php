<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\BalitaTerlantar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BalitaTerlantarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BalitaTerlantar::all()->map(function($balita_terlantar, $index){
            $tanggal_lahir = Carbon::parse($balita_terlantar->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $balita_terlantar->nama,
                'nik' => '\''.$balita_terlantar->nik,
                'kk' => '\''.$balita_terlantar->kk,
                'jenis_kelamin' => $balita_terlantar->jenis_kelamin,
                'tempat_lahir' =>  $balita_terlantar->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $balita_terlantar->agama,
                'alamat' => $balita_terlantar->alamat,
                'rt' => $balita_terlantar->rt,
                'rw' => $balita_terlantar->rw,
                'no_hp' => $balita_terlantar->no_hp,
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
