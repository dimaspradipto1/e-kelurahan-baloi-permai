<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Pemulung;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemulungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemulung::all()->map(function($pemulung, $index){
            $tanggal_lahir = Carbon::parse($pemulung->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $pemulung->nama,
                'nik' => '\''.$pemulung->nik,
                'kk' => '\''.$pemulung->kk,
                'jenis_kelamin' => $pemulung->jenis_kelamin,
                'tempat_lahir' =>  $pemulung->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $pemulung->agama,
                'alamat' => $pemulung->alamat,
                'rt' => $pemulung->rt,
                'rw' => $pemulung->rw,
                'no_hp' => $pemulung->no_hp,
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
