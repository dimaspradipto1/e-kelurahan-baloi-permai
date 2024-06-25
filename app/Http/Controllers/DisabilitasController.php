<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Disabilitas;
use Illuminate\Http\Request;
use App\Exports\DisabilitasExport;
use App\Imports\DisabilitasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\DisabilitasDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class DisabilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DisabilitasDataTable $dataTable)
    {
        return $dataTable->render('pages.disabilitas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.disabilitas.create', [
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all()
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

        Disabilitas::create($data);

        Alert::success('Success', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('disabilitas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disabilitas $disabilita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disabilitas $disabilita, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.disabilitas.edit', [
            'disabilita' => $disabilita,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disabilitas $disabilita)
    {
        $disabilita = Disabilitas::findOrFail($disabilita->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $disabilita->update($data);


        Alert::success('Success', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('disabilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disabilitas $disabilita)
    {
        $disabilita->delete();

        Alert::success('Success', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('disabilitas.index');
    }

    public function export_disabilitas()
    {
        return Excel::download(new DisabilitasExport, 'Data Penyandang Disabilitas.xlsx');
    }

    public function import_disabilitas(Request $request)
    {
        Excel::import(new DisabilitasImport, $request->file('file'));

        Alert::success('Success', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('disabilitas.index');
    }
}
