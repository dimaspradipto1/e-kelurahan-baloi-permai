<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\tahfiz;
use Illuminate\Http\Request;
use App\Exports\TahfizExport;
use App\Imports\TahfizImport;
use App\DataTables\TahfizDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TahfizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TahfizDataTable $dataTable)
    {
        return $dataTable->render('pages.tahfiz.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Rt $rt , Rw $rw)
    {
        return view('pages.tahfiz.create', [
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
            $data['no_hp'] = 0;
        }

        tahfiz::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('tahfiz.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(tahfiz $tahfiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tahfiz $tahfiz, Rt $rt, Rw $rw)
    {
        return view('pages.tahfiz.edit', [
            'tahfiz' => $tahfiz,
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tahfiz $tahfiz)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = 0;
        }

        $tahfiz->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('tahfiz.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tahfiz $tahfiz)
    {
        $tahfiz->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('tahfiz.index');
    }

    public function export_tahfiz()
    {
        return Excel::download(new TahfizExport, 'Tahfiz.xlsx');
    }

    public function import_tahfiz(Request $request)
    {
        Excel::import (new TahfizImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('tahfiz.index');
    }
}
