<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\ADK;
use App\Models\Warga;
use App\Exports\ADKExport;
use App\Imports\ADKImport;
use Illuminate\Http\Request;
use App\DataTables\ADKDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ADKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ADKDataTable $dataTable)
    {
        return $dataTable->render('pages.adk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, RT $rt, RW $rw)
    {
        return view('pages.adk.create', [
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

        ADK::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('adk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ADK $aDK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ADK $adk, Warga $warga, RT $rt, RW $rw)
    {
        return view('pages.adk.edit', [
            'adk' => $adk,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ADK $adk)
    {
        $adk = ADK::findOrFail($adk->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $adk->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('adk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ADK $adk)
    {
        $adk->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('adk.index');
    }

    public function export_adk()
    {
        return Excel::download(new ADKExport, 'Anak dengan kedisabilitasan.xlsx');
    }

    public function import_adk(Request $request)
    {
        Excel::import(new ADKImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('adk.index');
    }
}
