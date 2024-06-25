<?php

namespace App\Imports;

use App\Models\FasilitasOlahraga;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FasilitasOlahragaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $olahraga = new FasilitasOlahraga([
                'dokumen_legalitas' => $row['dokumen_legalitas'],
                'nama' => $row['nama'],
                'alamat' => $row['alamat'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'no_hp' => $row['no_hp'],
            ]);

            $olahraga->save();
        }
    }
}