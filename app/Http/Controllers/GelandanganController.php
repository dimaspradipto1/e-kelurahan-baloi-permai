<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Gelandangan;
use Illuminate\Http\Request;
use App\Exports\GelandanganExport;
use App\Imports\GelandanganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\GelandanganDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class GelandanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GelandanganDataTable $dataTable)
    {
        return $dataTable->render('pages.gelandangan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.gelandangan.create', [
            'warga' => $warga->all(),
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

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        Gelandangan::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('gelandangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gelandangan $gelandangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gelandangan $gelandangan, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.gelandangan.edit', [
            'gelandangan' => $gelandangan,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gelandangan $gelandangan)
    {
        $gelandangan = Gelandangan::findOrFail($gelandangan->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $gelandangan->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('gelandangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gelandangan $gelandangan)
    {
        $gelandangan->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('gelandangan.index');
    }

    public function export_gelandangan()
    {
        return Excel::download(new GelandanganExport, 'Data Gelandangan.xlsx');
    }

    public function import_gelandangan(Request $request)
    {
        Excel::import(new GelandanganImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('gelandangan.index');
    }
}
