<?php

namespace App\Imports;

use App\Models\KetuaRtRw;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RtRwImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){

            $tanggal_lahir = \DateTime::createFromFormat('d/m/Y', $row['tanggal_lahir']);

            $rtrw = KetuaRtRw::create([
                'nama' => $row['nama'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $tanggal_lahir ? $tanggal_lahir->format('Y-m-d') : null,
                'rw' => $row['rw'],
                'rt' => $row['rt'],
                'no_sk' => $row['no_sk'],
                'tmt_awal' => $row['tmt_awal'],
                'alamat' => $row['alamat'],
                'pekerjaan' => $row['pekerjaan'],
                'no_hp' => $row['no_hp'],
                'nik' => $row['nik'],
                'npwp' => $row['npwp'],
                'keterangan' => $row['keterangan'],
            ]);

            $rtrw->save();
        }
    }
}
