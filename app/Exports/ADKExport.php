<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\ADK;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ADKExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ADk::all()->map(function($adk, $index){
            $tanggal_lahir = Carbon::parse($adk->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $adk->nama,
                'nik' => '\''.$adk->nik,
                'kk' => '\''.$adk->kk,
                'jenis_kelamin' => $adk->jenis_kelamin,
                'tempat_lahir' =>  $adk->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $adk->agama,
                'alamat' => $adk->alamat,
                'rt' => $adk->rt,
                'rw' => $adk->rw,
                'no_hp' => $adk->no_hp,
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
