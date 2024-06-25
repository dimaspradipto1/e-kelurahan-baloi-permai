<?php

namespace App\Exports;

use App\Models\PekerjaSosialProfesional;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PekerjaSosialProfesionalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return PekerjaSosialProfesional::all()->map(function($pekerjaSosialProfesional){

            $tanggal_lahir = Carbon::parse($pekerjaSosialProfesional->tanggal_lahir)->translatedFormat('d/m/Y');

           
            return [
                'nama' => $pekerjaSosialProfesional->nama,
                'nik' => '\''.$pekerjaSosialProfesional->nik,
                'kk' => '\''.$pekerjaSosialProfesional->kk,
                'jenis_kelamin' => $pekerjaSosialProfesional->jenis_kelamin,
                'tempat_lahir' => $pekerjaSosialProfesional->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $pekerjaSosialProfesional->agama,
                'alamat' => $pekerjaSosialProfesional->alamat,
                'rt' => $pekerjaSosialProfesional->rt,
                'rw' => $pekerjaSosialProfesional->rw,
                'no_hp' => $pekerjaSosialProfesional->no_hp,
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
