<?php

namespace App\Imports;

use App\Models\AhliWarise;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AhliWarisImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){

            $tanggal = Date::excelToDateTimeObject((float) $row['tanggal']);

            
            $ahliWaris =  AhliWarise::create([
                'tanggal' => $tanggal,
                'nik' =>$row['nik'],
                'nama_meninggal' =>$row['nama_meninggal'],
                'nik_pemohon'   =>$row['nik_pemohon'],
                'nama_pemohon'  =>$row['nama_pemohon'],
                'alamat_pemohon' =>$row['alamat_pemohon'],
            ]);

            $ahliWaris->save();
         }
    }
}
