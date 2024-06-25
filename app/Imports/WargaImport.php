<?php

namespace App\Imports;

use App\Models\Warga;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WargaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collections)
    {

        foreach($collections as $row){
            $tanggal_lahir = Date::excelToDateTimeObject($row['tanggal_lahir']);

            if ($tanggal_lahir === null) {
               
                continue;
            }

            Warga::create([
                'nik' => $row['nik'],
                'kk' => $row['kk'],
                'nama' => $row['nama_warga'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $tanggal_lahir,
                'agama' => $row['agama'],
                'golongan_darah' => $row['golongan_darah'],
                'pendidikan' => $row['pendidikan'],
                'pekerjaan' => $row['pekerjaan'],
                'status_perkawinan' => $row['status_perkawinan'],
                'nama_ayah' => $row['nama_ayah'],
                'nama_ibu' => $row['nama_ibu'],
                'alamat_domisili' => $row['alamat_domisili'],
                'alamat_ktp' => $row['alamat_ktp'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
            ]);

        }
    }
}
