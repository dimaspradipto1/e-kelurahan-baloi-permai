<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\AnakKekerasan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnakKekerasanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AnakKekerasan::all()->map(function($anak_kekerasan, $index){
            $tanggal_lahir = Carbon::parse($anak_kekerasan->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $anak_kekerasan->nama,
                'nik' => '\''.$anak_kekerasan->nik,
                'kk' => '\''.$anak_kekerasan->kk,
                'jenis_kelamin' => $anak_kekerasan->jenis_kelamin,
                'tempat_lahir' =>  $anak_kekerasan->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $anak_kekerasan->agama,
                'alamat' => $anak_kekerasan->alamat,
                'rt' => $anak_kekerasan->rt,
                'rw' => $anak_kekerasan->rw,
                'no_hp' => $anak_kekerasan->no_hp,
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
