<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Gelandangan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class GelandanganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gelandangan::all()->map(function($gelandangan, $index){
            $tanggal_lahir = Carbon::parse($gelandangan->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $gelandangan->nama,
                'nik' => '\''.$gelandangan->nik,
                'kk' => '\''.$gelandangan->kk,
                'jenis_kelamin' => $gelandangan->jenis_kelamin,
                'tempat_lahir' =>  $gelandangan->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $gelandangan->agama,
                'alamat' => $gelandangan->alamat,
                'rt' => $gelandangan->rt,
                'rw' => $gelandangan->rw,
                'no_hp' => $gelandangan->no_hp,
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
