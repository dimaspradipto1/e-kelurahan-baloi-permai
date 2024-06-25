<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\PRSE;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PRSEExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PRSE::all()->map(function($prse, $index){
            $tanggal_lahir = Carbon::parse($prse->tanggal_lahir)->translatedFormat('d/m/Y');

            return [
                'no' => $index + 1,
                'nama' => $prse->nama,
                'nik' => '\''.$prse->nik,
                'kk' => '\''.$prse->kk,
                'jenis_kelamin' => $prse->jenis_kelamin,
                'tempat_lahir' =>  $prse->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $prse->agama,
                'alamat' => $prse->alamat,
                'rt' => $prse->rt,
                'rw' => $prse->rw,
                'no_hp' => $prse->no_hp,
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
