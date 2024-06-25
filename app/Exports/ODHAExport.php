<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\ODHA;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ODHAExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ODHA::all()->map(function($odha, $index){
            $tanggal_lahir = Carbon::parse($odha->tanggal_lahir)->format('d/m/Y');

            return [
                'no' => $index + 1,
                'nama' => $odha->nama,
                'nik' => '\''.$odha->nik,
                'kk' => '\''.$odha->kk,
                'jenis_kelamin' => $odha->jenis_kelamin,
                'tempat_lahir' => $odha->tempat_lahir,
                'tanggal_lahir' =>  $tanggal_lahir,
                'agama' => $odha->agama,
                'alamat' => $odha->alamat,
                'rt' => $odha->rt,
                'rw' => $odha->rw,
                'no_hp' => $odha->no_hp,
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
