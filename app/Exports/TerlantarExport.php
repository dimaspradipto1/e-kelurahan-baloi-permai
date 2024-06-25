<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Terlantar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TerlantarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Terlantar::all()->map(function($terlantar, $index){
            $tanggal_lahir = Carbon::parse($terlantar->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $terlantar->nama,
                'nik' => '\''.$terlantar->nik,
                'kk' => '\''.$terlantar->kk,
                'jenis_kelamin' => $terlantar->jenis_kelamin,
                'tempat_lahir' =>  $terlantar->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $terlantar->agama,
                'alamat' => $terlantar->alamat,
                'rt' => $terlantar->rt,
                'rw' => $terlantar->rw,
                'no_hp' => $terlantar->no_hp,
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
