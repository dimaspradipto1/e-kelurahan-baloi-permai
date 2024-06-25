<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Minoritas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MinoritasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Minoritas::all()->map(function($minoritas, $index){
            $tanggal_lahir = Carbon::parse($minoritas->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $minoritas->nama,
                'nik' => '\''.$minoritas->nik,
                'kk' => '\''.$minoritas->kk,
                'jenis_kelamin' => $minoritas->jenis_kelamin,
                'tempat_lahir' =>  $minoritas->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $minoritas->agama,
                'alamat' => $minoritas->alamat,
                'rt' => $minoritas->rt,
                'rw' => $minoritas->rw,
                'no_hp' => $minoritas->no_hp,
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
