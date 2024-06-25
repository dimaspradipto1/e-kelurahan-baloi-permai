<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\FakirMiskin;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FakirMiskinExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FakirMiskin::all()->map(function($fakir_miskin, $index){
            $tanggal_lahir = Carbon::parse($fakir_miskin->tanggal_lahir)->translatedFormat('d/m/Y');

            return [
                'no' => $index + 1,
                'nama' => $fakir_miskin->nama,
                'nik' => '\''.$fakir_miskin->nik,
                'kk' => '\''.$fakir_miskin->kk,
                'jenis_kelamin' => $fakir_miskin->jenis_kelamin,
                'tempat_lahir' =>  $fakir_miskin->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $fakir_miskin->agama,
                'alamat' => $fakir_miskin->alamat,
                'rt' => $fakir_miskin->rt,
                'rw' => $fakir_miskin->rw,
                'no_hp' => $fakir_miskin->no_hp,
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
