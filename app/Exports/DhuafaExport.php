<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Dhuafa;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DhuafaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dhuafa::all()->map(function($dhuafa, $index){
            $tanggal_lahir = Carbon::parse($dhuafa->tanggal_lahir)->translatedFormat('d/m/Y');

            return [
                'no' => $index + 1,
                'nama' => $dhuafa->nama,
                'nik' => '\''.$dhuafa->nik,
                'kk' => '\''.$dhuafa->kk,
                'jenis_kelamin' => $dhuafa->jenis_kelamin,
                'tempat_lahir' =>  $dhuafa->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $dhuafa->agama,
                'alamat' => $dhuafa->alamat,
                'rt' => $dhuafa->rt,
                'rw' => $dhuafa->rw,
                'no_hp' => $dhuafa->no_hp,
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
