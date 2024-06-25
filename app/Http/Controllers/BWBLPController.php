<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\BWBLP;
use App\Models\Warga;
use App\Exports\BWBLPexport;
use App\Imports\BWBLPImport;
use Illuminate\Http\Request;
use App\DataTables\BWBLPDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class BWBLPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BWBLPDataTable $dataTable)
    {
        return $dataTable->render('pages.bwblp.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, RW $rw, RT $rt)
    {
        return view('pages.bwblp.create', [
            'warga' => $warga->all(),
            'rws' => $rw->all(),
            'rts' => $rt->all(),
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

        BWBLP::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('bwblp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BWBLP $bwblp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BWBLP $bwblp, Warga $warga, RW $rw, RT $rt)
    {
        return view('pages.bwblp.edit', [
            'bwblp' => $bwblp,
            'warga' => $warga->all(),
            'rws' => $rw->all(),
            'rts' => $rt->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BWBLP $bwblp)
    {
        $bwblp = BWBLP::findOrFail($bwblp->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $bwblp->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('bwblp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BWBLP $bwblp)
    {
        $bwblp->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('bwblp.index');
    }

    public function export_bwblp()
    {
        return Excel::download(new BWBLPexport, 'Data Bekas Warga Binaan Lembaga Permasyarakatan .xlsx');
    }

    public function import_bwblp(Request $request)
    {
        Excel::import(new BWBLPImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('bwblp.index');
    }
}
