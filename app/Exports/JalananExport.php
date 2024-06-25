<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Jalanan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class JalananExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jalanan::all()->map(function($jalanan, $index){
            $tanggal_lahir = Carbon::parse($jalanan->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $jalanan->nama,
                'nik' => '\''.$jalanan->nik,
                'kk' => '\''.$jalanan->kk,
                'jenis_kelamin' => $jalanan->jenis_kelamin,
                'tempat_lahir' =>  $jalanan->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $jalanan->agama,
                'alamat' => $jalanan->alamat,
                'rt' => $jalanan->rt,
                'rw' => $jalanan->rw,
                'no_hp' => $jalanan->no_hp,
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
