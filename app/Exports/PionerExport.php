<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Pioner;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PionerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pioner::all()->map(function($pioner, $index){
            $tanggal_lahir = Carbon::parse($pioner->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $pioner->nama,
                'nik' => '\''.$pioner->nik,
                'kk' => '\''.$pioner->kk,
                'jenis_kelamin' => $pioner->jenis_kelamin,
                'tempat_lahir' =>  $pioner->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $pioner->agama,
                'alamat' => $pioner->alamat,
                'rt' => $pioner->rt,
                'rw' => $pioner->rw,
                'no_hp' => $pioner->no_hp,
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
