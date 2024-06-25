<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\warga;
use App\Models\Sembako;
use App\Exports\WargaExport;
use Illuminate\Http\Request;
use App\Exports\SembakoExport;
use App\Imports\SembakoImport;
use App\DataTables\SembakoDataTable;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\SembakoRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SembakoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SembakoDataTable $dataTable, Request $request)
    { 
        return $dataTable->render('pages.sembako.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw, Warga $warga)
    {
        return view('pages.sembako.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all(),
            'warga' => $warga->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SembakoRequest $request)
    {
        $data = $request->all();

        if (!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        Sembako::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('sembako.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sembako $sembako)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sembako $sembako, RT $rt, RW $rw, warga $warga)
    {
        return view('pages.sembako.edit', [
            'sembako' => $sembako,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sembako $sembako)
    {
        $data = $request->all();


        if (!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        $sembako->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah!!')->autoclose(3000)->toToast();
        return redirect(route('sembako.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sembako $sembako)
    {
        $sembako->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus!!')->autoclose(3000)->toToast();
        return redirect(route('sembako.index'));
    }

    public function export_sembako(Request $request)
    {
        // return Excel::download(new SembakoExport, 'data_sembako.xlsx');

        $search = $request->get('search');
    return Excel::download(new SembakoExport($search), 'Data Penerima Sembako.xlsx');
    }



    public function import_sembako(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        Excel::import(new SembakoImport, $file);

        Alert::success('Berhasil', 'Data berhasil diimport!!')->autoclose(3000)->toToast();

        return redirect()->route('sembako.index');
    }
}
