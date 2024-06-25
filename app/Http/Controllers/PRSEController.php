<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\PRSE;
use App\Models\Warga;
use App\Exports\PRSEExport;
use App\Imports\PRSEImport;
use Illuminate\Http\Request;
use App\DataTables\PRSEDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PRSEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PRSEDataTable $datatable)
    {
        return $datatable->render('pages.prse.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.prse.create',[
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

        PRSE::create($data);

        Alert::success('Berhasil', 'Data Berhasil Disimpan')->autoclose(3000)->toToast();
        return redirect()->route('prse.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PRSE $pRSE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PRSE $prse, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.prse.edit', [
            'prse' => $prse,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PRSE $prse)
    {
        $prse = PRSE::FindOrFail($prse->id);

        $data = $request->all();


        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $prse->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('prse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PRSE $prse)
    {
        $prse->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('prse.index');
    }

    public function export_prse()
    {
        return Excel::download(new PRSEExport, 'Perempuan rawan sosial ekonomi.xlsx');
    }

    public function import_prse(Request $request)
    {
        Excel::import(new PRSEImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('prse.index');
    }
}
