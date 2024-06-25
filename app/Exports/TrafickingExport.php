<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Traficking;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrafickingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Traficking::all()->map(function($traficking, $index){
            $tanggal_lahir = Carbon::parse($traficking->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $traficking->nama,
                'nik' => '\''.$traficking->nik,
                'kk' => '\''.$traficking->kk,
                'jenis_kelamin' => $traficking->jenis_kelamin,
                'tempat_lahir' => $traficking->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $traficking->agama,
                'alamat' => $traficking->alamat,
                'rt' => $traficking->rt,
                'rw' => $traficking->rw,
                'no_hp' => $traficking->no_hp,
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
