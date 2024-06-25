<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\KBSP;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KBSPExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KBSP::all()->map(function($kbsp, $index){
            $tanggal_lahir = Carbon::parse($kbsp->tanggal_lahir)->translatedFormat('d/m/Y');
            
            return [
                'no' => $index + 1,
                'nama' => $kbsp->nama,
                'nik' => '\''.$kbsp->nik,
                'kk' => '\''.$kbsp->kk,
                'jenis_kelamin' => $kbsp->jenis_kelamin,
                'tempat_lahir' => $kbsp->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $kbsp->agama,
                'alamat' => $kbsp->alamat,
                'rt' => $kbsp->rt,
                'rw' => $kbsp->rw,
                'no_hp' => $kbsp->no_hp,
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
