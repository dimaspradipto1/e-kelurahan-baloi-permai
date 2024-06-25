<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\PindahWilayah;
use App\Exports\PindahWilayahExport;
use App\Imports\PindahWilayahImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\PindahWilayahDataTable;

class PindahWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PindahWilayahDataTable $datatable)
    {
        return $datatable->render('pages.pindah_wilayah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, RT $rt, RW $rw)
    {
        $warga = Warga::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view('pages.pindah_wilayah.create', compact('warga', 'rt', 'rw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $warga = Warga::where('nama', $request->warga)->first();
       
        $pindah = new PindahWilayah([

            'warga' => $warga->nama,
            'nik' => $warga->nik,
            'alamat_asal' => $request->alamat_asal,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'rt_tujuan' => $request->rt_tujuan,
            'rw_tujuan' => $request->rw_tujuan,
            'alamat_tujuan' => $request->alamat_tujuan,
            'tanggal_pindah' => $request->tanggal_pindah,
        ]);
        $pindah->save();

        $warga->update([
            'rt' => $request->rt_tujuan,
            'rw' => $request->rw_tujuan,
            'alamat_domisili' => $request->alamat_tujuan
        ]);

        Alert::success('Berhasil', 'Data Pindah Wilayah Berhasil Diinput')->autoclose(3000)->toToast();
        return redirect()->route('pindah_wilayah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PindahWilayah $pindahWilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PindahWilayah $pindahWilayah)
    {
        $warga = Warga::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view('pages.pindah_wilayah.edit', compact('pindahWilayah', 'warga', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PindahWilayah $pindahWilayah, Warga $warga, Rt $rt, Rw $rw)
    {
        
        $pindahWilayah->update($request->all());
        $warga->update([
            'rt' => $request->rt_tujuan,
            'rw' => $request->rw_tujuan,
            'alamat_domisili' => $request->alamat_tujuan
        ]);


        Alert::success('Berhasil', 'Data Pindah Wilayah Berhasil Diupdate')->autoclose(3000)->toToast();
        return redirect()->route('pindah_wilayah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PindahWilayah $pindahWilayah)
    {
        $pindahWilayah->delete();
        Alert::success('SUCCESS', 'Data Pindah Wilayah Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pindah_wilayah.index');
    }

    public function export_pindah_wilayah()
    {
        return Excel::download(new PindahWilayahExport, 'pindah wilayah.xlsx');
    }

    public function import_pindah_wilayah(Request $request)
    {
        $request ->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        Excel::import(new PindahWilayahImport, $file);
    
        // Excel::import(new PindahWilayahImport, request()->file('file'));

        Alert::success('SUCCESS', 'Data Pindah Wilayah Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('pindah_wilayah.index');

    }
}
