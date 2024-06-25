<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\AnakTerlantar;
use App\Exports\AnakTerlantarExport;
use App\Imports\AnakTerlantarImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\AnakTerlantarDataTable;

class AnakTerlantarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnakTerlantarDataTable $dataTable)
    {
        return $dataTable->render('pages.anak_terlantar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_terlantar.create', [
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

        AnakTerlantar::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('anak-terlantar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnakTerlantar $anak_terlantar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnakTerlantar $anak_terlantar, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_terlantar.edit', [
            'anak_terlantar' => $anak_terlantar,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnakTerlantar $anak_terlantar)
    {
        $anak_terlantar = AnakTerlantar::findOrFail($anak_terlantar->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $anak_terlantar->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('anak-terlantar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnakTerlantar $anak_terlantar)
    {
        $anak_terlantar->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('anak-terlantar.index');
    }

    public function export_anak_terlantar()
    {
        return Excel::download(new AnakTerlantarExport, 'Data anak terlantar.xlsx');
    }

    public function import_anak_terlantar(Request $request)
    {
        Excel::import(new AnakTerlantarImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('anak-terlantar.index');
    }
}
