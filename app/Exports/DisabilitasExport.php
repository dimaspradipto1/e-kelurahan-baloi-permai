<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Disabilitas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DisabilitasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Disabilitas::all()->map(function($disabilitas, $index){
            $tanggal_lahir = Carbon::parse($disabilitas->tanggal_lahir)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $disabilitas->nama,
                'nik' => '\''.$disabilitas->nik,
                'kk' => '\''.$disabilitas->kk,
                'jenis_kelamin' => $disabilitas->jenis_kelamin,
                'tempat_lahir' =>  $disabilitas->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $disabilitas->agama,
                'alamat' => $disabilitas->alamat,
                'rt' => $disabilitas->rt,
                'rw' => $disabilitas->rw,
                'no_hp' => $disabilitas->no_hp,
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
