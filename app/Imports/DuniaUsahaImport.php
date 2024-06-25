<?php

namespace App\Imports;

use App\Models\DuniaUsaha;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DuniaUsahaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
           $duniausaha = new DuniaUsaha([
                'nama_usaha' => $row['nama_usaha'],
                'alamat' => $row['alamat'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'no_hp' => $row['no_hp'] ?? '-',
           ]);

            $duniausaha->save();
        }   
    }
}
