<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Wpk;
use App\Models\Warga;
use App\Exports\WpkExport;
use App\Imports\WpkImport;
use Illuminate\Http\Request;
use App\DataTables\WpkDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class WpkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WpkDataTable $datatable)
    {
        return $datatable->render('pages.wpks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.wpks.create', [
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

        if(!isset($data['no_hp']))
        {
            $data['no_hp'] = '-';
        }

        Wpk::create($data);

        Alert::success('Berhasil', 'Data Berhasil Disimpan')->autoclose(3500)->toToast();
        return redirect()->route('wpks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wpk $wpk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wpk $wpk, warga $warga, Rt $rt, Rw $rw)
    {
        // $warga = Warga::all();
    // $currentWarga = $wpks->warga;

        return view('pages.wpks.edit', [
            'wpks' => $wpk,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wpk $wpk)
    {
        $data = $request->all();

        if(!isset($data['no_hp']))
        {
            $data['no_hp'] = '-';
        }

        $wpk->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3500)->toToast();
        return redirect()->route('wpks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wpk $wpk)
    {
        $wpk->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3500)->toToast();
        return redirect()->route('wpks.index');
    }

    public function export_wpks()
    {
        return Excel::download(new WpkExport, 'wpk.xlsx');
    }

    public function import_wpks(Request $request)
    {
        Excel::import(new WpkImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3500)->toToast();
        return redirect()->route('wpks.index');
    }
}
