<?php

namespace App\Imports;

use App\Models\SuratKeterangan;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuratKeteranganImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $tanggal_surat = Date::excelToDateTimeObject($row['tanggal_surat']);

            $suratketerangan = new SuratKeterangan([
                'nomor_surat' => $row['nomor_surat'],
                'tanggal_surat' => $tanggal_surat,
                'nama_pemohon' => $row['nama_pemohon'],
                'alamat_pemohon' => $row['alamat_pemohon'],
                'keperluan' => $row['keperluan'],
            ]);

            $suratketerangan->save();
        }
    }
}
