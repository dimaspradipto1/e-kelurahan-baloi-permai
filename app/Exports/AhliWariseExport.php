<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\AhliWarise;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AhliWariseExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AhliWarise::all()->map(function($ahliWaris, $index){
            return
            [
                'id' => $index + 1,
                'tanggal' => Carbon::parse($ahliWaris->tanggal_lahir)->format('d/m/Y'),
                'nik' => "'".$ahliWaris->nik,
                'nama_meninggal' => $ahliWaris->nama_meninggal,
                'nik_pemohon' => "'".$ahliWaris->nik_pemohon,
                'nama_pemohon' => $ahliWaris->nama_pemohon,
                'alamat_pemohon' => $ahliWaris->alamat_pemohon,
            ];
        });
    }

    public function headings(): array
        {
            return [
                'No',
                'Tanggal',
                'NIK',
                'Nama Meninggal',
                'NIK Pemohon',
                'Nama Pemohon',
                'Alamat Pemohon',
            ];
        }
}
