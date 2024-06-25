<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Minoritas;
use Illuminate\Http\Request;
use App\Exports\MinoritasExport;
use App\Imports\MinoritasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\MinoritasDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class MinoritasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MinoritasDataTable $dataTable)
    {
        return $dataTable->render('pages.minoritas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.minoritas.create', [
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

        Minoritas::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('minoritas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Minoritas $minoritas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Minoritas $minorita, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.minoritas.edit', [
            'minorita' => $minorita,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Minoritas $minorita)
    {
        $minoritas = Minoritas::findOrFail($minorita->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $minoritas->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('minoritas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Minoritas $minorita)
    {
        $minorita->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('minoritas.index');
    }

    public function export_minoritas()
    {
        return Excel::download(new MinoritasExport, 'Data Minoritas.xlsx');
    }

    public function import_minoritas(Request $request)
    {
        Excel::import(new MinoritasImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('minoritas.index');
    }
}
