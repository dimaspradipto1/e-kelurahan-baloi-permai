<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Warga;
use App\Models\Pindah;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Exports\PindahExport;
use App\Imports\PindahImport;
use Illuminate\Routing\Controller;
use App\DataTables\PindahDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PindahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PindahDataTable $dataTable)
    {
       
        return $dataTable->render('pages.pindah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, RT $rt, RW $rw, Kelurahan $kelurahan, Kecamatan $kecamatan )
    {
        $warga = Warga::all();
        $rt = RT::all();
        $rw = RW::all();
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        return view('pages.pindah.create', compact('warga', 'rt', 'rw', 'kelurahan', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $warga = Warga::where('nama', $request->warga)->first();
        $kelurahan = Kelurahan::where('kelurahan', $request->kelurahan)->first();
        $kecamatan = Kecamatan::where('kecamatan', $request->kecamatan)->first();
        $pindah = new Pindah([
            'nik' => $warga->nik,
            'warga' => $warga->nama,
            'alamat_asal' => $request->alamat_asal,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'tanggal_pindah' => $request->tanggal_pindah,
            'alamat_tujuan' => $request->alamat_tujuan,
            'kelurahan' => $kelurahan->kelurahan,
            'kecamatan' => $kecamatan->kecamatan,
        ]);

        $pindah->save();

        $warga->delete();

        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pindah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pindah $pindah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pindah $pindah, Warga $warga)
    {   
        $pindah = Pindah::findOrFail($pindah->id);
        $warga = Warga::all();
        return view('pages.pindah.edit', compact('pindah', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pindah $pindah)
    {
        $pindah->update($request->all());
        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('pindah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pindah $pindah)
    {
        $pindah->delete();
        Alert::success('Success', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pindah.index');
    }

    public function export_pindah()
    {
        return (new PindahExport)->download('pindah-warga.xlsx');
    }

    public function import_pindah(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
 
        // Get the uploaded file
        $file = $request->file('file');
 
        // Process the Excel file
        Excel::import(new PindahImport, $file);
        Warga::truncate();
         
		// notifikasi dengan session
		Alert::success('sukses','Data Siswa Berhasil Diimport!')->autoclose(3000)->toToast();
 
		// alihkan halaman kembali
		return redirect()->route('pindah.index');
    }
}
