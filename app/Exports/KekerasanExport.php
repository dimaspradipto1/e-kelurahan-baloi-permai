<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Kekerasan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KekerasanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kekerasan::all()->map(function($kekerasan, $index){
            $tanggal_lahir = Carbon::parse($kekerasan->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $kekerasan->nama,
                'nik' => '\''.$kekerasan->nik,
                'kk' => '\''.$kekerasan->kk,
                'jenis_kelamin' => $kekerasan->jenis_kelamin,
                'tempat_lahir' => $kekerasan->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $kekerasan->agama,
                'alamat' => $kekerasan->alamat,
                'rt' => $kekerasan->rt,
                'rw' => $kekerasan->rw,
                'no_hp' => $kekerasan->no_hp,
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
