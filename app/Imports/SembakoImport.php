<?php

namespace App\Imports;

use App\Models\sembako;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SembakoImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $sembako = new Sembako([
                'nama' => $row['nama']?? '-',
                'nik' => $row['nik']?? '-',
                'kk' => $row['kk']?? '-',
                'alamat' => $row['alamat']?? '-',
                'rt' => $row['rt']?? '-',
                'rw' => $row['rw']?? '-',
                'no_hp' => $row['no_hp'] ?? '-',
                'tahap' =>$row['tahap'],
                'tahun' =>$row['tahun']
            ]);

            $sembako->save();
        }

    }
}
