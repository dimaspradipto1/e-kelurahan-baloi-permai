<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\BencanaSosial;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BencanaSosialExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BencanaSosial::all()->map(function($bencana_sosial, $index){
            $tanggal_lahir = Carbon::parse($bencana_sosial->tanggal_lahir)->translatedFormat('d/m/Y');
            
            return [
                'no' => $index + 1,
                'nama' => $bencana_sosial->nama,
                'nik' => '\''.$bencana_sosial->nik,
                'kk' => '\''.$bencana_sosial->kk,
                'jenis_kelamin' => $bencana_sosial->jenis_kelamin,
                'tempat_lahir' =>  $bencana_sosial->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $bencana_sosial->agama,
                'alamat' => $bencana_sosial->alamat,
                'rt' => $bencana_sosial->rt,
                'rw' => $bencana_sosial->rw,
                'no_hp' => $bencana_sosial->no_hp,
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
