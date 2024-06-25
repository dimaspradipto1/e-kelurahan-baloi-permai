<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Pioner;
use Illuminate\Http\Request;
use App\Exports\PionerExport;
use App\Imports\PionerImport;
use App\DataTables\PionerDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PionerDataTable $dataTable)
    {
        return $dataTable->render('pages.pioner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pioner.create', [
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

        Pioner::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pioner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pioner $pioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pioner $pioner, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pioner.edit', [
            'pioner' => $pioner,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pioner $pioner)
    {
        $pioner = Pioner::findOrFail($pioner->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $pioner->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('pioner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pioner $pioner)
    {
        $pioner->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pioner.index');
    }

    public function export_pioner()
    {
        return Excel::download(new PionerExport, 'Data Pioner.xlsx');
    }

    public function import_pioner(Request $request)
    {
        Excel::import(new PionerImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('pioner.index');
    }
}
