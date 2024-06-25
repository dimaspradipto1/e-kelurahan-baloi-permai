<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Traficking;
use Illuminate\Http\Request;
use App\Exports\TrafickingExport;
use App\Imports\TrafickingImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\TrafickingDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class TrafickingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TrafickingDataTable $dataTable)
    {
        return $dataTable->render('pages.traficking.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.traficking.create', [
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

        Traficking::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('traficking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Traficking $traficking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Traficking $traficking, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.traficking.edit', [
            'traficking' => $traficking,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Traficking $traficking)
    {
        $traficking = Traficking::findOrFail($traficking->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $traficking->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('traficking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Traficking $traficking)
    {
        $traficking->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('traficking.index');
    }

    public function export_traficking()
    {
        return Excel::download(new TrafickingExport, 'Data Traficking.xlsx');
    }

    public function import_traficking(Request $request)
    {
        Excel::import(new TrafickingImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('traficking.index');
    }
}
