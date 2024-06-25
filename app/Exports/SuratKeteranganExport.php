<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\SuratKeterangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuratKeteranganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SuratKeterangan::with('warga')->get()->map(function($suratKeterangan, $index)
        {
            $tanggal_surat = Carbon::parse($suratKeterangan->tanggal_surat)->translatedFormat('d/m/Y');

            return [
                'No'=> $index + 1,
                'nomor_surat' => $suratKeterangan->nomor_surat,
                'tanggal_surat' => $tanggal_surat,
                'nama_pemohon' => $suratKeterangan->nama_pemohon,
                'alamat_pemohon' => $suratKeterangan->alamat_pemohon,
                'keperluan' => $suratKeterangan->keperluan,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nomor Surat',
            'Tanggal Surat',
            'Nama Pemohon',
            'Alamat Pemohon',
            'Keperluan',
        ];
    }
}
