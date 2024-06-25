<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\warga;
use App\Models\dhuafa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\DhuafaExport;
use App\Imports\DhuafaImport;
use App\DataTables\DhuafaDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class DhuafaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DhuafaDataTable $dataTable)
    {
        return $dataTable->render('pages.dhuafa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.dhuafa.create', [
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

        dhuafa::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('dhuafa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(dhuafa $dhuafa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dhuafa $dhuafa, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.dhuafa.edit', [
            'dhuafa' => $dhuafa,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dhuafa $dhuafa)
    {
        $dhuafa = dhuafa::findOrFail($dhuafa->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $dhuafa->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('dhuafa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dhuafa $dhuafa)
    {
        $dhuafa->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('dhuafa.index');
    }

    public function export_dhuafa(Excel $excel)
    {
        return $excel->download(new DhuafaExport, 'Dhuafa.xlsx');
    }

    public function import_dhuafa(Request $request, Excel $excel)
    {
        $excel->import(new DhuafaImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();

        return redirect()->route('dhuafa.index');
    }

}
