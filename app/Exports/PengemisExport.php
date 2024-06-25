<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Pengemis;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengemisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengemis::all()->map(function($pengemis, $index){
            $tanggal_lahir = Carbon::parse($pengemis->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $pengemis->nama,
                'nik' => '\''.$pengemis->nik,
                'kk' => '\''.$pengemis->kk,
                'jenis_kelamin' => $pengemis->jenis_kelamin,
                'tempat_lahir' =>  $pengemis->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $pengemis->agama,
                'alamat' => $pengemis->alamat,
                'rt' => $pengemis->rt,
                'rw' => $pengemis->rw,
                'no_hp' => $pengemis->no_hp,
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
