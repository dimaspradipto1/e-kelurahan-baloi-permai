<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\AnakHukum;
use Illuminate\Http\Request;
use App\Exports\AnakHukumExport;
use App\Imports\AnakHukumImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\AnakhukumDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class AnakHukumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnakhukumDataTable $dataTable)
    {
        return $dataTable->render('pages.anak_hukum.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_hukum.create', [
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
        $data = $request->All();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        AnakHukum::create($data);
        Alert::success('Berhasil', 'Data Berhasil Disimpan')->autoclose(3000)->toToast();
        return redirect()->route('anak-hukum.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnakHukum $anakHukum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnakHukum $anak_hukum, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_hukum.edit', [
            'anak_hukum' => $anak_hukum,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnakHukum $anak_hukum)
    {
        $anak_hukum = AnakHukum::findOrFail($anak_hukum->id);
        $data = $request->All();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $anak_hukum->update($data);
        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('anak-hukum.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnakHukum $anak_hukum)
    {
        $anak_hukum->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('anak-hukum.index');
    }

    public function export_anak_hukum()
    {
        return Excel::download(new AnakHukumExport, 'Data Anak Berhadapan dengan Hukum.xlsx');
    }

    public function import_anak_hukum(Request $request)
    {
        Excel::import(new AnakHukumImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('anak-hukum.index');
    }
}
