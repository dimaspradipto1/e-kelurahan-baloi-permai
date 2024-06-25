<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Kekerasan;
use Illuminate\Http\Request;
use App\Exports\KekerasanExport;
use App\Imports\KekerasanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\KekerasanDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class KekerasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KekerasanDataTable $dataTable)
    {
        return $dataTable->render('pages.kekerasan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.kekerasan.create', [
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

        if(!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        Kekerasan::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('kekerasan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kekerasan $kekerasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kekerasan $kekerasan, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.kekerasan.edit', [
            'kekerasan' => $kekerasan,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kekerasan $kekerasan)
    {
        $kekerasan = Kekerasan::findOrFail($kekerasan->id);

        $data = $request->all();

        if(!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        $kekerasan->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('kekerasan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kekerasan $kekerasan)
    {
        $kekerasan->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('kekerasan.index');
    }

    public function export_kekerasan()
    {
        return Excel::download(new KekerasanExport, 'Data Korban Tindak Kekerasan.xlsx');
    }

    public function import_kekerasan(Request $request)
    {
        Excel::import(new KekerasanImport, $request->file('file'));
        
        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('kekerasan.index');
    }
}
