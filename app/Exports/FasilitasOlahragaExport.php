<?php

namespace App\Exports;

use App\Models\FasilitasOlahraga;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FasilitasOlahragaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FasilitasOlahraga::all()->map(function ($olahraga, $index){
            return [
                'id' => $index + 1,
                'dokumen_legalitas' => $olahraga->dokumen_legalitas,
                'nama' => $olahraga->nama,
                'alamat' => $olahraga->alamat,
                'rt' => $olahraga->rt,
                'rw' => $olahraga->rw,
                'no_hp' => $olahraga->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'no',
            'dokumen legalitas',
            'nama',
            'alamat',
            'rt',
            'rw',
            'no hp',
        ];
    }
}
