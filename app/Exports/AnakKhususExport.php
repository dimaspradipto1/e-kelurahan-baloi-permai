<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\AnakKhusus;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnakKhususExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AnakKhusus::all()->map(function($anak_khusu, $index){
            $tanggal_lahir = Carbon::parse($anak_khusu->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $anak_khusu->nama,
                'nik' => '\''.$anak_khusu->nik,
                'kk' => '\''.$anak_khusu->kk,
                'jenis_kelamin' => $anak_khusu->jenis_kelamin,
                'tempat_lahir' =>  $anak_khusu->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $anak_khusu->agama,
                'alamat' => $anak_khusu->alamat,
                'rt' => $anak_khusu->rt,
                'rw' => $anak_khusu->rw,
                'no_hp' => $anak_khusu->no_hp,
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
