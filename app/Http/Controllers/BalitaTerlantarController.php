<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\BalitaTerlantar;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BalitaTerlantarExport;
use App\Imports\BalitaTerlantarImport;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\BalitaTerlantarDataTable;

class BalitaTerlantarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BalitaTerlantarDataTable $dataTable)
    {
        return $dataTable->render('pages.balita_terlantar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.balita_terlantar.create', [
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

        BalitaTerlantar::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('balita-terlantar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BalitaTerlantar $balitaTerlantar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BalitaTerlantar $balita_terlantar, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.balita_terlantar.edit', [
            'balita_terlantar' => $balita_terlantar,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BalitaTerlantar $balita_terlantar)
    {
        $balita_terlantar = BalitaTerlantar::findOrFail($balita_terlantar->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $balita_terlantar->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('balita-terlantar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BalitaTerlantar $balita_terlantar)
    {
        $balita_terlantar->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('balita-terlantar.index');
    }

    public function export_balita_terlantar()
    {
        return Excel::download(new BalitaTerlantarExport, 'Data balita terlantar.xlsx');
    }

    public function import_balita_terlantar(Request $request)
    {
        Excel::import(new BalitaTerlantarImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('balita-terlantar.index');
    }
}
