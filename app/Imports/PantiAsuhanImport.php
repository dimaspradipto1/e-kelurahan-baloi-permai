<?php

namespace App\Imports;

use App\Models\PantiAsuhan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PantiAsuhanImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $panti = PantiAsuhan::create([
                'nama' => $row['nama'],
                'alamat' => $row['alamat'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'no_hp' => $row['no_hp'] ?? '-',
            ]);

            $panti->save();
        }
    }
}