<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\PMBS;
use App\Models\Warga;
use App\Exports\PMBSExport;
use App\Imports\PMBSImport;
use Illuminate\Http\Request;
use App\DataTables\PMBSDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PMBSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PMBSDataTable $dataTable)
    {
        return $dataTable->render('pages.pmbs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, RT $rt, RW $rw)
    {
        return view('pages.pmbs.create', [
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

        PMBS::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan!')->autoclose(3000)->toToast();
        return redirect()->route('pmbs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PMBS $pmbs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PMBS $pmb, Warga $warga, RT $rt, RW $rw)
    {
        return view('pages.pmbs.edit', [
            'pmb' => $pmb,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PMBS $pmb)
    {
        $pmbs = PMBS::findOrFail($pmb->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $pmbs->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah!')->autoclose(3000)->toToast();
        return redirect()->route('pmbs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PMBS $pmb)
    {
        $pmb->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus!')->autoclose(3000)->toToast();
        return redirect()->route('pmbs.index');
    }

    public function export_pmbs()
    {
        return Excel::download(new PMBSExport, 'Data Pekerja Migran Bermasalah Sosial.xlsx');
    }

    public function import_pmbs(Request $request)
    {
        Excel::import(new PMBSImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport!')->autoclose(3000)->toToast();
        return redirect()->route('pmbs.index');
    }
}
