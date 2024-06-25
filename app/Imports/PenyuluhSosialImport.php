<?php

namespace App\Imports;

use App\Models\PenyuluhSosial;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenyuluhSosialImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $penyuluhsosial = new PenyuluhSosial([
                'nama_lembaga' => $row['nama_lembaga'],
                'alamat' => $row['alamat'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'no_hp' => $row['no_hp'] ?? '-',
            ]);

            $penyuluhsosial->save();
        }   
    }
}
