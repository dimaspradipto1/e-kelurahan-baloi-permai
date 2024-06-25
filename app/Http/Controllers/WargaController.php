<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\warga;
use App\Exports\WargaExport;
use App\Imports\WargaImport;
use Illuminate\Http\Request;
use App\DataTables\WargaDataTable;
use App\Models\PekerjaSosial;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Console\View\Components\Warn;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WargaDataTable $dataTable)
    {
        return $dataTable->render('pages.warga.index');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        
        return view('pages.warga.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        warga::create($data);

        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('warga.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(warga $warga,)
    {
        return view('pages.warga.show', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(warga $warga, RT $rt, RW $rw)
    {
        return view('pages.warga.edit', [
            'warga' => $warga,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, warga $warga)
    {
        $data = $request->all();
        $warga->update($data);
        

        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('warga.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(warga $warga)
    {
        $warga->delete();

        Alert::success('Success', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('warga.index');
    }

    /**
     * Export to Excel
     */
    public function export_warga()
    {
        return Excel::download(new WargaExport, 'warga.xlsx');
    }

    public function import_warga(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
 
        // Get the uploaded file
        $file = $request->file('file');
 
        // Process the Excel file
        Excel::import(new WargaImport, $file);
 
		// notifikasi dengan session
		Alert::success('sukses','Data Siswa Berhasil Diimport!')->autoclose(3000)->toToast();
 
		// alihkan halaman kembali
		return redirect()->route('warga.index');
    }
}
