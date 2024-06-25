<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\AnakKhusus;
use Illuminate\Http\Request;
use App\Exports\AnakKhususExport;
use App\Imports\AnakKhususImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\AnakKhususDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class AnakKhususController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnakKhususDataTable $dataTable)
    {
        return $dataTable->render('pages.anak_khusus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_khusus.create',[
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

        AnakKhusus::create($data);
        Alert::success('Berhasil', 'Data Berhasil Disimpan')->autoclose(3000)->toToast();
        return redirect()->route('anak_khusus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnakKhusus $anakKhusus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnakKhusus $anak_khusu, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.anak_khusus.edit',[
            'anak_khusu' => $anak_khusu,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnakKhusus $anak_khusu)
    {
        $anak_khusu = AnakKhusus::findOrFail($anak_khusu->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $anak_khusu->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('anak-khusus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnakKhusus $anak_khusu)
    {
        $anak_khusu->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('anak-khusus.index');
    }

    public function export_anak_khusus()
    {
        return Excel::download(new AnakKhususExport, 'Data Anak perlindungan Khusus.xlsx');
    }

    public function import_anak_khusus(Request $request)
    {
        Excel::import(new AnakKhususImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil Diimport')->autoclose(3000)->toToast();
        return redirect()->route('anak-khusus.index');
    }
}
