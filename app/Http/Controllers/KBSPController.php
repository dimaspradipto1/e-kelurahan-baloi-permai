<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\KBSP;
use App\Models\warga;
use App\Exports\KBSPExport;
use App\Imports\KBSPImport;
use Illuminate\Http\Request;
use App\DataTables\KBSPDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KBSPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KBSPDataTable $dataTable)
    {
        return $dataTable->render('pages.kbsp.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.kbsp.create', [
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

        KBSP::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('kbsp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KBSP $kBSP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KBSP $kbsp, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.kbsp.edit', [
            'kbsp' => $kbsp,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KBSP $kbsp)
    {
        $kbsp = KBSP::findOrFail($kbsp->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $kbsp->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('kbsp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KBSP $kbsp)
    {
        $kbsp->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('kbsp.index');
    }

    public function export_kbsp()
    {
        return Excel::download(new KBSPExport, 'KBSP.xlsx');
    }

    public function import_kbsp(Request $request)
    {
        Excel::import(new KBSPImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('kbsp.index');
    }
}
