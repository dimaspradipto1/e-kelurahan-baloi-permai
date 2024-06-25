<?php

namespace App\Imports;

use App\Models\Pindah;
use App\Models\warga;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PindahImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $tanggal_pindah = \DateTime::createFromFormat('d/m/Y', $row['tanggal_pindah']);

            $pindah = new Pindah([
                'nik' => $row['nik'],
                'warga' => $row['nama_warga'],
                'alamat_asal' => $row['alamat_asal'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'tanggal_pindah' => $tanggal_pindah ? $tanggal_pindah->format('Y-m-d') : null,
                'alamat_tujuan' => $row['alamat_tujuan'],
                'kelurahan' => $row['kelurahan'],
                'kecamatan' => $row['kecamatan'],
            ]);

            $pindah->save();

            $warga = warga::where('nik', $row['nik'])->first();
            if($warga){
                $warga->delete();
            }
        }
    }
   
}
