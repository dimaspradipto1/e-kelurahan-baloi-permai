<?php

namespace App\Imports;

use App\Models\Pernikahan;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PernikahanImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // $tanggal_surat = Date::excelToDateTimeObject((float) $row['tanggal_surat']);

            $tanggal_surat = \DateTime::createFromFormat('d/m/Y', $row['tanggal_surat']);

            $pernikahan = new Pernikahan([
                'no_surat' => $row['no_surat'],
                'tanggal_surat' => $tanggal_surat ? $tanggal_surat->format('Y-m-d') : null,
                'nama' => $row['nama'],
                'nik' => $row['nik'],
                'alamat' => $row['alamat'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
            ]);

            $pernikahan->save();
        }
    }
}
