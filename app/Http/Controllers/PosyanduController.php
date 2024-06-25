<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\RW;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use App\Exports\PosyanduExport;
use App\Imports\PosyanduImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\PosyanduDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PosyanduDataTable $dataTable)
    {
        return $dataTable->render('pages.posyandu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Rt $rt, Rw $rw)
    {
        return view('pages.posyandu.create', [
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

        Posyandu::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('posyandu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posyandu $posyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posyandu $posyandu, Rt $rt, Rw $rw)
    {
        return view('pages.posyandu.edit', [
            'posyandu' => $posyandu,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posyandu $posyandu)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $posyandu->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('posyandu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posyandu $posyandu)
    {
        $posyandu->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('posyandu.index');
    }

    public function export_posyandu()
    {
        return Excel::download(new PosyanduExport, 'Posyandu.xlsx');
    }

    public function import_posyandu(Request $request)
    {
        Excel::Import (new PosyanduImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('posyandu.index');
    }
}
