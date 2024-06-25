<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\KarangTaruna;
use Illuminate\Http\Request;
use App\Exports\KarangTarunaExport;
use App\Imports\KarangTarunaImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\KarangTarunaDataTable;
use App\Http\Requests\KarangTarunaRequest;

class KarangTarunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KarangTarunaDataTable $dataTable)
    {
        return $dataTable->render('pages.karang_taruna.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Rt $rt, Rw $rw)
    {
        return view('pages.karang_taruna.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KarangTarunaRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }
        
        KarangTaruna::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('karang-taruna.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KarangTaruna $karangTaruna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KarangTaruna $karangTaruna, RT $rt, RW $rw)
    {
        return view('pages.karang_taruna.edit', [
            'karangtaruna' => $karangTaruna,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KarangTaruna $karangTaruna)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $karangTaruna->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('karang-taruna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KarangTaruna $karangTaruna)
    {
        $karangTaruna->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('karang-taruna.index');
    }

    public function export_karang_taruna()
    {
        return Excel::download(new KarangTarunaExport, 'karang-taruna.xlsx');
    }

    public function import_karang_taruna(Request $request)
    {
        Excel::import(new KarangTarunaImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('karang-taruna.index');
    }
}
