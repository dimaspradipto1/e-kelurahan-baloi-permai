<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Pemulung;
use Illuminate\Http\Request;
use App\Exports\PemulungExport;
use App\Imports\PemulungImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\PemulungDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class PemulungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PemulungDataTable $dataTable)
    {
        return $dataTable->render('pages.pemulung.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pemulung.create', [
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

        Pemulung::create($data);
        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pemulung.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemulung $pemulung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemulung $pemulung, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pemulung.edit', [
            'pemulung' => $pemulung,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemulung $pemulung)
    {
        $pemulung = Pemulung::findOrFail($pemulung->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $pemulung->update($data);
        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('pemulung.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemulung $pemulung)
    {
        $pemulung->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pemulung.index');
    }

    public function export_pemulung()
    {
        return Excel::download(new PemulungExport, 'Data Pemulung.xlsx');
    }

    public function import_pemulung(Request $request)
    {
        Excel::import(new PemulungImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('pemulung.index');
    }
}
