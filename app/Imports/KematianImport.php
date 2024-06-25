<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Kematian;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KematianImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            $tanggal_kematian = Date::excelToDateTimeObject((float) $row['tanggal_kematian']);

            $kematian = new Kematian([
                'warga' => $row['nama_warga'],
                'jenis_kematian' => $row['sebab_kematian'],
                'tempat' => $row['tempat_kematian'],
                'tanggal_kematian' =>  $tanggal_kematian,
                'jenis_kelamin' => $row['jenis_kelamin'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'keterangan' => $row['keterangan'],
            ]);

            $kematian->save();
        }
    }
}
