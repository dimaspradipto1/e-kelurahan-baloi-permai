<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\BencanaAlam;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BencanaAlamExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BencanaAlam::all()->map(function($bencana_alam, $index){
            $tanggal_lahir = Carbon::parse($bencana_alam->tanggal_lahir)->translatedFormat('d/m/Y');
            
            return [
                'no' => $index + 1,
                'nama' => $bencana_alam->nama,
                'nik' => '\''.$bencana_alam->nik,
                'kk' => '\''.$bencana_alam->kk,
                'jenis_kelamin' => $bencana_alam->jenis_kelamin,
                'tempat_lahir' => $bencana_alam->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $bencana_alam->agama,
                'alamat' => $bencana_alam->alamat,
                'rt' => $bencana_alam->rt,
                'rw' => $bencana_alam->rw,
                'no_hp' => $bencana_alam->no_hp,
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
