<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Kematian;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KematianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Kematian::all()->map(function($kematian, $index){
            return
            [
                'id' => $index +1,
                'warga' => $kematian->warga,
                'jenis_kematian' => $kematian->jenis_kematian,
                'tempat' => $kematian->tempat,
                'tanggal_kematian' => Carbon::parse($kematian->tanggal_kematian)->format('d/m/Y'),
                'jenis_kelamin' => $kematian->jenis_kelamin,
                'rt' => $kematian->rt,
                'rw' => $kematian->rw,
                'keterangan' => $kematian->keterangan,
            ];
        });
    }

    public function headings(): array
        {
            return [
                'No',
                'Nama Warga',
                'Sebab Kematian',
                'Tempat Kematian',
                'Tanggal Kematian',
                'Jenis Kelamin',
                'RT',
                'RW',
                'Keterangan',
            ];
        }
}
