<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\KetuaRtRw;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RtRwExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KetuaRtRw::all()->map(function ($rtrw, $index){
            $tanggal_lahir = Carbon::parse($rtrw->tanggal_lahir)->translatedFormat('d/m/Y');

            $tmtawal = Carbon::parse($rtrw->tmt_awal)->translatedFormat('d/m/Y');
            return [
                'no' => $index + 1,
                'nama' => $rtrw->nama,
                'tempat_lahir' => $rtrw->tempat_lahir,
                'tanggal_lahir' =>$tanggal_lahir,
                'rw' => $rtrw->rw,
                'rt' => $rtrw->rt,
                'no_sk' => $rtrw->no_sk,
                'tmt_awal' => $tmtawal,
                'alamat' => $rtrw->alamat,
                'pekerjaan' => $rtrw->pekerjaan,
                'no_hp' => $rtrw->no_hp,
                'nik' => '\''.$rtrw->nik,
                'npwp' => '\''.$rtrw->npwp,
                'keterangan' => $rtrw->keterangan,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'RW',
            'RT',
            'No SK',
            'TMT Awal',
            'Alamat',
            'Pekerjaan',
            'No HP',
            'NIK',
            'NPWP',
            'Keterangan',
        ];
    }
}
