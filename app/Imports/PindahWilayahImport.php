<?php

namespace App\Imports;

use DateTime;
use App\Models\PindahWilayah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PindahWilayahImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){

            $tanggal_pindah = DateTime::createFromFormat('d/m/Y', $row['tanggal_pindah']);

            $pindahWilayah = new PindahWilayah([
                'nik' => $row['nik'],
                'warga' => $row['warga'],
                'alamat_asal' => $row['alamat_asal'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'rt_tujuan' => $row['rt_tujuan'],
                'rw_tujuan' => $row['rw_tujuan'],
                'alamat_tujuan' => $row['alamat_tujuan'],
                'tanggal_pindah' => $tanggal_pindah ? $tanggal_pindah->format('Y-m-d') : null,
            ]);

            $pindahWilayah->save();
        }
    }
}
