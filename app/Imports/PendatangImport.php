<?php

namespace App\Imports;

use App\Models\warga;
use App\Models\Pendatang;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendatangImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
          
            $tanggal_datang = Date::excelToDateTimeObject((float) $row['tanggal_datang']);

            $pendatang = new Pendatang([
                'nik' => $row['nik'],
                'warga' => $row['nama_warga'],
                'alamat_asal' => $row['alamat_asal'],
                'kelurahan' => $row['kelurahan'],
                'kecamatan' => $row['kecamatan'],
                'alamat_tujuan' => $row['alamat_tujuan'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'tanggal_datang' => $tanggal_datang,
            ]);

            $pendatang->save();

            $warga = new warga([
                'nik' => $row['nik'],
                'nama' => $row['nama_warga'],
                'alamat_domisili' => $row['alamat_asal'],
                'kelurahan' => $row['kelurahan'],
                'kecamatan' => $row['kecamatan'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
            ]);

            $warga->save();
        }
    }
}
