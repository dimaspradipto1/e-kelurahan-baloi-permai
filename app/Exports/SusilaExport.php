<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Susila;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SusilaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Susila::all()->map(function($susila, $index){
            $tanggal_lahir = Carbon::parse($susila->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $susila->nama,
                'nik' => '\''.$susila->nik,
                'kk' => '\''.$susila->kk,
                'jenis_kelamin' => $susila->jenis_kelamin,
                'tempat_lahir' => $susila->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $susila->agama,
                'alamat' => $susila->alamat,
                'rt' => $susila->rt,
                'rw' => $susila->rw,
                'no_hp' => $susila->no_hp,
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
