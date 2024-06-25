<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\AnakHukum;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnakHukumExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AnakHukum::all()->map(function($anak_hukum, $index){
            $tanggal_lahir = Carbon::parse($anak_hukum->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $anak_hukum->nama,
                'nik' => '\''.$anak_hukum->nik,
                'kk' => '\''.$anak_hukum->kk,
                'jenis_kelamin' => $anak_hukum->jenis_kelamin,
                'tempat_lahir' =>  $anak_hukum->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $anak_hukum->agama,
                'alamat' => $anak_hukum->alamat,
                'rt' => $anak_hukum->rt,
                'rw' => $anak_hukum->rw,
                'no_hp' => $anak_hukum->no_hp,
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
