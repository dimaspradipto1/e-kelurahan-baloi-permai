<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Pindah;
use App\Models\Sembako;
use App\Models\Kematian;
use App\Models\KetuaRtRw;
use App\Models\Pendatang;
use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Models\SuratKeterangan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $warga = Warga::count();
        $pendatang = Pendatang::count();
        $pindah = Pindah::count();
        $ketuartrw = KetuaRtRw::count();
        $surat  = SuratKeterangan::count();
        $sembako = Sembako::count();
        $kematian = Kematian::count();
        $pernikahan = Pernikahan::count();

        $dataTahap = Sembako::select('tahun', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->get();

        return view('layouts.dashboard.index', [
            'warga' => $warga,
            'pendatang' => $pendatang,
            'pindah' => $pindah,
            'kematian' => $kematian,
            'ketuartrw' => $ketuartrw,
            'surat' => $surat,
            'sembako' => $sembako,
            'pernikahan' => $pernikahan,
            'dataTahap' => $dataTahap,
        ]);
    }
}