<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\FakirMiskin;
use Illuminate\Http\Request;
use App\Exports\FakirMiskinExport;
use App\Imports\FakirMiskinImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\FakirMiskinDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class FakirMiskinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FakirMiskinDataTable $datatable)
    {
        return $datatable->render('pages.fakir_miskin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.fakir_miskin.create',[
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

        FakirMiskin::create($data);

        Alert::success('Berhasil', 'Data Berhasil Disimpan')->autoclose(3000)->toToast();
        return redirect()->route('fakir-miskin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FakirMiskin $fakirMiskin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FakirMiskin $fakir_miskin, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.fakir_miskin.edit', [
            'fakir_miskin' => $fakir_miskin,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FakirMiskin $fakir_miskin)
    {
        $fakir_miskin = FakirMiskin::findOrFail($fakir_miskin->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $fakir_miskin->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('fakir-miskin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FakirMiskin $fakirmiskin)
    {
        $fakirmiskin->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('fakir-miskin.index');
    }

    public function export_fakir_miskin()
    {
        return Excel::download(new FakirMiskinExport, 'fakir_miskin.xlsx');
    }

    public function import_fakir_miskin(Request $request)
    {
        Excel::import(new FakirMiskinImport, $request->file('file'));
        
        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('fakir-miskin.index');
    }
}
