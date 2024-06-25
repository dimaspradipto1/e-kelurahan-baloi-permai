<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\wksbm;
use App\Exports\WksbmExport;
use App\Imports\WksbmImport;
use Illuminate\Http\Request;
use App\DataTables\WksbmDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class WksbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WksbmDataTable $dataTable)
    {
        return $dataTable->render('pages.wksbm.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Wksbm $wksbm,Rt $rt, Rw $rw)
    {
        return view('pages.wksbm.create',[
            'wksbm' => $wksbm,
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
        
        wksbm::create($data);

        Alert::success('Berhasil', 'Data Berhasil Disimpan')->autoclose(3000)->toToast();
        return redirect()->route('wksbm.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(wksbm $wksbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wksbm $wksbm, Rt $rt, Rw $rw)
    {
        return view('pages.wksbm.edit',[
            'wksbm' => $wksbm,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wksbm $wksbm)
    {
        $data = $request->all();

        $wksbm->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('wksbm.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wksbm $wksbm)
    {
        $wksbm->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('wksbm.index');
    }

    public function export_wksbm()
    {
        return Excel::download(new WksbmExport, 'wksbm.xlsx');
    }

    public function import_wksbm()
    {
        Excel::import(new WksbmImport, request()->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('wksbm.index');
    }
}
