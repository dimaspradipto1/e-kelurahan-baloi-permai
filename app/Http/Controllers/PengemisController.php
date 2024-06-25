<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Pengemis;
use Illuminate\Http\Request;
use App\Exports\PengemisExport;
use App\Imports\PengemisImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\PengemisDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class PengemisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PengemisDataTable $datatable)
    {
        return $datatable->render('pages.pengemis.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pengemis.create', [
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

        Pengemis::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pengemis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengemis $pengemis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengemis $pengemi, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pengemis.edit', [
            'pengemi' => $pengemi,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengemis $pengemi)
    {
        $pengemi = Pengemis::findOrFail($pengemi->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $pengemi->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('pengemis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengemis $pengemi)
    {
        $pengemi->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pengemis.index');
    }

    public function export_pengemis()
    {
        return Excel::download(new PengemisExport, 'Data Pengemis.xlsx');
    }

    public function import_pengemis(Request $request)
    {
        Excel::import(new PengemisImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('pengemis.index');
    }
}
