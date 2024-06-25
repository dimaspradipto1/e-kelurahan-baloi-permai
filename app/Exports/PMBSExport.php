<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\PMBS;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PMBSExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PMBS::all()->map(function($pmbs, $index){
            $tanggal_lahir = Carbon::parse($pmbs->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'No' => $index + 1,
                'nama' => $pmbs->nama,
                'nik' => '\''.$pmbs->nik,
                'kk' => '\''.$pmbs->kk,
                'jenis_kelamin' => $pmbs->jenis_kelamin,
                'tempat_lahir' => $pmbs->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $pmbs->agama,
                'alamat' => $pmbs->alamat,
                'rt' => $pmbs->rt,
                'rw' => $pmbs->rw,
                'no_hp' => $pmbs->no_hp,
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
