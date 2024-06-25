<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\ODHA;
use App\Models\Warga;
use App\Exports\ODHAExport;
use App\Imports\ODHAImport;
use Illuminate\Http\Request;
use App\DataTables\ODHADataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ODHAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ODHADataTable $dataTable)
    {
        return $dataTable->render('pages.odha.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.odha.create', [
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

        ODHA::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('odha.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ODHA $odha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ODHA $odha, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.odha.edit', [
            'odha' => $odha,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ODHA $odha)
    {
        $odha = ODHA::findOrFail($odha->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $odha->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('odha.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ODHA $odha)
    {
        $odha->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('odha.index');
    }

    public function export_odha()
    {
        return Excel::download(new ODHAExport, 'Data ODHA.xlsx');
    }

    public function import_odha(Request $request)
    {
        Excel::import(new ODHAImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('odha.index');
    }
}
