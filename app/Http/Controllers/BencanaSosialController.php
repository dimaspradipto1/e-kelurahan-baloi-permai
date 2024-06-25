<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\BencanaSosial;
use App\Exports\BencanaSosialExport;
use App\Imports\BencanaSosialImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\BencanaSosialDataTable;

class BencanaSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BencanaSosialDataTable $dataTable)
    {
        return $dataTable->render('pages.bencana_sosial.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.bencana_sosial.create', [
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

        BencanaSosial::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('bencana-sosial.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BencanaSosial $bencanasosial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BencanaSosial $bencana_sosial, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.bencana_sosial.edit', [
            'bencana_sosial' => $bencana_sosial,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BencanaSosial $bencana_sosial)
    {
        $bencana_sosial = BencanaSosial::findOrFail($bencana_sosial->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $bencana_sosial->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('bencana-sosial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BencanaSosial $bencanasosial)
    {
        $bencanasosial = BencanaSosial::findOrFail($bencanasosial->id);
        $bencanasosial->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('bencana-sosial.index');
    }

    public function export_bencana_sosial()
    {
        return Excel::download(new BencanaSosialExport, 'bencana sosial.xlsx');
    }

    public function import_bencana_sosial(Request $request)
    {
        Excel::import(new BencanaSosialImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();

        return redirect()->route('bencana-sosial.index');
    }
}
