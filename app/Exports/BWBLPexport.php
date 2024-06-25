<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\BWBLP;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BWBLPexport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BWBLP::all()->map(function($bwblp, $index){
            $tanggal_lahir = Carbon::parse($bwblp->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $bwblp->nama,
                'nik' => '\''.$bwblp->nik,
                'kk' => '\''.$bwblp->kk,
                'jenis_kelamin' => $bwblp->jenis_kelamin,
                'tempat_lahir' =>  $bwblp->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $bwblp->agama,
                'alamat' => $bwblp->alamat,
                'rt' => $bwblp->rt,
                'rw' => $bwblp->rw,
                'no_hp' => $bwblp->no_hp,
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
