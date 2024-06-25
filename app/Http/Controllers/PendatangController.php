<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Warga;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pendatang;
use Illuminate\Http\Request;
use App\Exports\PendatangExport;
use App\Imports\PendatangImport;
use App\DataTables\PindahDataTable;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\PendatangDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class PendatangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PendatangDataTable $dataTable)
    {
        return $dataTable->render('pages.pendatang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Kelurahan $kelurahan, Kecamatan $kecamatan, RT $rt, RW $rw)
    {  
        return view('pages.pendatang.create', [
            'warga' => $warga->all(),
            'kelurahan' => $kelurahan->all(),
            'kecamatan' => $kecamatan->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $pendatang = new Pendatang([
            'nik' => $request->nik,
            'warga' => $request->warga,
            'alamat_asal' => $request->alamat_asal,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_tujuan' => $request->alamat_tujuan,
            'tanggal_datang' => $request->tanggal_datang,
        ]);

        $warga = new Warga([
            'nik' => $request->nik,
            'nama' => $request->warga,
            'alamat_domisili' => $request->alamat_tujuan,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        $pendatang->save();
        $warga->save();

        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pendatang.index', compact('warga'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendatang $pendatang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendatang $pendatang, Warga $warga)
    {   
        $pendatang = Pendatang::findOrFail($pendatang->id);
        $warga = Warga::all();
        return view('pages.pendatang.edit', compact('pendatang', 'warga'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendatang $pendatang, Warga $warga)
    {
        $pendatang->update($request->all());

        $warga = Warga::where('nik', $pendatang->nik)->first();
        $warga->update([
            'nik' =>$request->nik,
            'nama' => $request->warga,
            'alamat_domisili' => $request->alamat_tujuan,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('pendatang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendatang $pendatang)
    {
        $pendatang->delete();
        Alert::success('Success', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pendatang.index');
    }

    public function export_pendatang()
    {
        return Excel::download(new PendatangExport, 'pendatang-warga.xlsx');
    }

    public function import_pendatang(Request $request)
    {
        //validate the upload file
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);

        //get the upload file
        $file = request()->file('file');

        //import data
        Excel::import(new PendatangImport, $file);


        // notifikasi dengan session
		Alert::success('sukses','Data Siswa Berhasil Diimport!')->autoclose(3000)->toToast();
 
		// alihkan halaman kembali
		return redirect()->route('pendatang.index');
        
    }
}
