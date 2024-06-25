<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\PekerjaSosialMasyarakat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PekerjaSosialMasyarakatExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PekerjaSosialMasyarakat::all()->map(function($pekerjaSosialMasayarakat){

            $tanggal_lahir = Carbon::parse($pekerjaSosialMasayarakat->tanggal_lahir)->translatedFormat('d/m/Y');

           
            return [
                'nama' => $pekerjaSosialMasayarakat->nama,
                'nik' => '\''.$pekerjaSosialMasayarakat->nik,
                'kk' => '\''.$pekerjaSosialMasayarakat->kk,
                'jenis_kelamin' => $pekerjaSosialMasayarakat->jenis_kelamin,
                'tempat_lahir' => $pekerjaSosialMasayarakat->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $pekerjaSosialMasayarakat->agama,
                'alamat' => $pekerjaSosialMasayarakat->alamat,
                'rt' => $pekerjaSosialMasayarakat->rt,
                'rw' => $pekerjaSosialMasayarakat->rw,
                'no_hp' => $pekerjaSosialMasayarakat->no_hp,
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
