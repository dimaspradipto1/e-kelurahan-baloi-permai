<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Susila;
use Illuminate\Http\Request;
use App\Exports\SusilaExport;
use App\Imports\SusilaImport;
use App\DataTables\SusilaDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SusilaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SusilaDataTable $dataTable)
    {
        return $dataTable->render('pages.susila.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.susila.create', [
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

        if(!isset($datap['no_hp'])){
            $data['no_hp'] = '-';
        }

        Susila::create($data);

        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('susila.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Susila $susila)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Susila $susila, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.susila.edit', [
            'susila' => $susila,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Susila $susila)
    {
        $susila = Susila::findOrFail($susila->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $susila->update($data);

        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('susila.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Susila $susila)
    {
        $susila->delete();

        Alert::success('Success', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('susila.index');
    }

    public function export_susila()
    {
        return Excel::download(new SusilaExport, 'Data Tuna Susila.xlsx');
    }

    public function import_susila(Request $request)
    {
        Excel::import(new SusilaImport, $request->file('file'));

        Alert::success('Success', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('susila.index');
    }
}
