<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PekerjaSosialProfesional;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PekerjaSosialProfesionalExport;
use App\Imports\PekerjaSosialProfesionalImport;
use App\DataTables\PekerjaSosialProfesionalDataTable;

class PekerjaSosialProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PekerjaSosialProfesionalDataTable $datatable)
    {
        return $datatable->render('pages.pekerja_sosial_profesional.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pekerja_sosial_profesional.create', [
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

        PekerjaSosialProfesional::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-profesional.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PekerjaSosialProfesional $pekerjaSosialProfesional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PekerjaSosialProfesional $pekerjaSosialProfesional, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pekerja_sosial_profesional.edit', [
            'pekerjaSosialProfesional' => $pekerjaSosialProfesional,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PekerjaSosialProfesional $pekerjaSosialProfesional)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $pekerjaSosialProfesional->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-profesional.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PekerjaSosialProfesional $pekerjaSosialProfesional)
    {
        $pekerjaSosialProfesional->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-profesional.index');
    }

    public function export_pekerja_sosial_Profesional()
    {
        return Excel::download(new PekerjaSosialProfesionalExport, 'pekerja-sosial-profesional.xlsx');
    }

    public function import_pekerja_sosial_profesional(Request $request)
    {
        Excel::import(new PekerjaSosialProfesionalImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-profesional.index');
    }
}
