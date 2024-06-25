<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Napza;
use App\Models\Warga;
use App\Exports\NapzaExport;
use Illuminate\Http\Request;
use App\DataTables\NapzaDataTable;
use App\Imports\NapzaImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class NapzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NapzaDataTable $dataTable)
    {
        return $dataTable->render('pages.napza.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.napza.create', [
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

        Napza::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('napza.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Napza $napza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Napza $napza, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.napza.edit', [
            'napza' => $napza,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Napza $napza)
    {
        $napza = Napza::findOrFail($napza->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $napza->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('napza.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Napza $napza)
    {
        $napza->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('napza.index');
    }

    public function export_napza()
    {
        return Excel::download(new NapzaExport, 'Data Penyalahgunaan NAPZA.xlsx');
    }

    public function import_napza(Request $request)
    {
        Excel::import(new NapzaImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('napza.index');
    }
}
