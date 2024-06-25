<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Warga;
use App\Models\Kematian;
use Illuminate\Http\Request;
use App\Exports\KematianExport;
use App\Imports\KematianImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\KematianDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KematianDataTable $dataTable)
    {
        return $dataTable->render('pages.kematian.index');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create( Warga $warga, RT $rt, RW $rw)
    {
        $warga = Warga::all();
        $rt = RT::all();
        $rw = RW::all();
        return view('pages.kematian.create', compact('warga','rt', 'rw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $warga = Warga::where('nama', $request->warga)->first();
        $rt = RT::where('rt', $request->rt)->first();
        $rw = RW::where('rw', $request->rw)->first();
        $kematian = new Kematian([
            'warga' => $warga->nama,
            'jenis_kematian' => $request->jenis_kematian,
            'tempat' => $request->tempat,
            'tanggal_kematian' => $request->tanggal_kematian,
            'jenis_kelamin' => $request->jenis_kelamin,
            'rt' => $rt->rt,
            'rw' => $rw->rw,
            'keterangan' => $request->keterangan,
 
        ]);

        $kematian->save();

        $warga->delete();

        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('kematian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kematian $kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kematian $kematian, Warga $warga, RT $rt, RW $rw)
    {
        $warga = Warga::all();
        $rt = RT::all();
        $rw = RW::all();

        return view('pages.kematian.edit', compact('kematian','warga', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kematian $kematian)
    {
        $data = $request->all();
        $kematian->update($data);
        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('kematian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kematian $kematian)
    {
        $kematian->delete();
        Alert::success('Success', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('kematian.index');
    }

    public function export_kematian()
    {
        return Excel::download(new KematianExport, 'Kematian.xlsx');
    }

    public function import_kematian()
    {
        Excel::import(new KematianImport, request()->file('file'));

        Alert::success('Success', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('kematian.index');
    }
}
