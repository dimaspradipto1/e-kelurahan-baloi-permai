<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\AnakKekerasan;
use App\Exports\AnakKekerasanExport;
use App\Imports\AnakKekerasanImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\AnakKekerasanDataTable;

class AnakKekerasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnakKekerasanDataTable $dataTable)
    {
        return $dataTable->render('pages.anak_kekerasan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_kekerasan.create', [
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

        AnakKekerasan::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('anak-kekerasan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnakKekerasan $anakKekerasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnakKekerasan $anak_kekerasan, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_kekerasan.edit', [
            'anak_kekerasan' => $anak_kekerasan,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnakKekerasan $anak_kekerasan)
    {
        $ana_kekerasan = AnakKekerasan::findOrFail($anak_kekerasan->id);
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $anak_kekerasan->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('anak-kekerasan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnakKekerasan $anak_kekerasan)
    {
        $anak_kekerasan->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('anak-kekerasan.index');
    }

    public function export_anak_kekerasan()
    {
        return Excel::download(new AnakKekerasanExport, 'Anak Korban Tindakan Kekerasan.xlsx');
    }

    public function import_anak_kekerasan(Request $request)
    {
        Excel::import(new AnakKekerasanImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('anak-kekerasan.index');
    }
}
