<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Gereja;
use Illuminate\Http\Request;
use App\Exports\GerejaExport;
use App\Imports\GerejaImport;
use App\DataTables\GerejaDataTable;
use App\Http\Requests\GerejaRequest;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class GerejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GerejaDataTable $dataTable)
    {
        return $dataTable->render('pages.gereja.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.gereja.create',[
            'rts'=>$rt->all(),
            'rws'=>$rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GerejaRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        Gereja::create($data);

        Alert::success('Berhasil', 'Data Gereja Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('gereja.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gereja $gereja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gereja $gereja, RT $rt, RW $rw)
    {
        return view('pages.gereja.edit',[
            'gereja'=>$gereja,
            'rts'=>RT::all(),
            'rws'=>RW::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gereja $gereja)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $gereja->update($data);

        Alert::success('Berhasil', 'Data Gereja Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('gereja.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gereja $gereja)
    {
        $gereja->delete();

        Alert::success('Berhasil', 'Data Gereja Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('gereja.index');
    }

    public function export_gereja()
    {
        return Excel::download(new GerejaExport, 'Data Gereja.xlsx');
    }

    public function import_gereja(Request $request)
    {
        Excel::import(new GerejaImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Gereja Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('gereja.index');
    }
}
