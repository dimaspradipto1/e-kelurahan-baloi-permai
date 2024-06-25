<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Terlantar;
use Illuminate\Http\Request;
use App\Exports\TerlantarExport;
use App\Imports\TerlantarImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\TerlantarDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class TerlantarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TerlantarDataTable $dataTable)
    {
        return $dataTable->render('pages.terlantar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        Return view('pages.terlantar.create', [
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

        Terlantar::create($data);

        Alert::success('Berhasil', 'Data Terlantar Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('terlantar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Terlantar $terlantar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terlantar $terlantar, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.terlantar.edit', [
            'terlantar' => $terlantar,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terlantar $terlantar)
    {
        $terlantar = Terlantar::findOrFail($terlantar->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $terlantar->update($data);

        Alert::success('Berhasil', 'Data Terlantar Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('terlantar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terlantar $terlantar)
    {
        $terlantar->delete();

        Alert::success('Berhasil', 'Data Terlantar Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('terlantar.index');
    }

    public function export_terlantar()
    {
        return Excel::download(new TerlantarExport, 'Data Lanjut Usia Terlantar.xlsx');
    }

    public function import_terlantar(Request $request)
    {
        Excel::import(new TerlantarImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Terlantar Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('terlantar.index');
    }
}
