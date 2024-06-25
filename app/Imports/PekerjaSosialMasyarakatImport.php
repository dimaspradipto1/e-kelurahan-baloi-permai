<?php

namespace App\Imports;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\PekerjaSosialMasyarakat;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PekerjaSosialMasyarakatImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            $tanggal_lahir = Date::excelToDateTimeObject((float) $row['tanggal_lahir']);

            $pekerjaSosialMasyarakat = new PekerjaSosialMasyarakat([
                'nama' => $row['nama'],
                'nik' => $row['nik'],
                'kk' => $row['kk'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $row['agama'],
                'alamat' => $row['alamat'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'no_hp' => $row['no_hp'] ?? '-',
            ]);

            $pekerjaSosialMasyarakat->save();
        }
    }
}
