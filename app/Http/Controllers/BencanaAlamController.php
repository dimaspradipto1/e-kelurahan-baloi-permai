<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\BencanaAlam;
use Illuminate\Http\Request;
use App\Exports\BencanaAlamExport;
use App\Imports\BencanaAlamImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\BencanaAlamDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class BencanaAlamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BencanaAlamDataTable $dataTable)
    {
        return $dataTable->render('pages.bencana_alam.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.bencana_alam.create',[
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all()
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

        BencanaAlam::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('bencana-alam.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BencanaAlam $bencanaAlam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BencanaAlam $bencana_alam, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.bencana_alam.edit',[
            'bencana_alam' => $bencana_alam,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BencanaAlam $bencana_alam)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $bencana_alam->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('bencana-alam.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BencanaAlam $bencana_alam)
    {
        $bencana_alam->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('bencana-alam.index');
    }

    public function export_bencana_alam()
    {
        return Excel::download(new BencanaAlamExport, 'bencana alam.xlsx');
    }

    public function import_bencana_alam(Request $request)
    {
        Excel::import(new BencanaAlamImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('bencana-alam.index');
    }
}
