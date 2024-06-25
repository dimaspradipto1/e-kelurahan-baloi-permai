<?php

namespace App\Exports;

use App\Models\Warga;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class WargaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Warga::all()->map(function($warga, $index){
            return
            [
                'id' => $index + 1,
                'nik' => "'". (int) $warga->nik,
                'kk' => "'$warga->kk",
                'nama' => $warga->nama,
                'jenis_kelamin' => $warga->jenis_kelamin,
                'tempat_lahir' => $warga->tempat_lahir,
                'tanggal_lahir' => Carbon::parse($warga->tanggal_lahir)->format('d-m-Y'),
                'agama' => $warga->agama,
                'golongan_darah' => $warga->golongan_darah,
                'pendidikan' => $warga->pendidikan,
                'pekerjaan' => $warga->pekerjaan,
                'status_perkawinan' => $warga->status_perkawinan,
                'nama_ayah' => $warga->nama_ayah,
                'nama_ibu' => $warga->nama_ibu,
                'alamat_domisili' => $warga->alamat_domisili,
                'alamat_ktp' => $warga->alamat_ktp,
                'rt' => $warga->rt,
                'rw' => $warga->rw,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'KK',
            'Nama Warga',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Golongan Darah',
            'Agama',
            'Pendidikan',
            'Pekerjaan',
            'Status Perkawinan',
            'Nama Ayah',
            'Nama Ibu',
            'Alamat Domisili',
            'Alamat KTP',
            'RT',
            'RW',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();

                for ($row = 2; $row <= $highestRow; $row++) {
                    $cell = $sheet->getCell("B$row");
                    $cell->setValueExplicit("#NULL!", \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_ERROR);
                }
            },
        ];
    }
}
