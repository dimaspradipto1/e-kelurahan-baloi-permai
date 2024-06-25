<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\AnakTerlantar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnakTerlantarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AnakTerlantar::all()->map(function($anak_telantar, $index){
            $tanggal_lahir = Carbon::parse($anak_telantar->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $anak_telantar->nama,
                'nik' => '\''.$anak_telantar->nik,
                'kk' => '\''.$anak_telantar->kk,
                'jenis_kelamin' => $anak_telantar->jenis_kelamin,
                'tempat_lahir' =>  $anak_telantar->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $anak_telantar->agama,
                'alamat' => $anak_telantar->alamat,
                'rt' => $anak_telantar->rt,
                'rw' => $anak_telantar->rw,
                'no_hp' => $anak_telantar->no_hp,
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
