<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Warga;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PekerjaSosialMasyarakat;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PekerjaSosialMasyarakatExport;
use App\Imports\PekerjaSosialMasyarakatImport;
use App\DataTables\PekerjaSosialMasyarakatDataTable;

class PekerjaSosialMasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PekerjaSosialMasyarakatDataTable $dataTable)
    {
        return $dataTable->render('pages.pekerja_sosial_masyarakat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pekerja_sosial_masyarakat.create',[
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

        PekerjaSosialMasyarakat::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-masyarakat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PekerjaSosialMasyarakat $pekerjaSosialMasyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PekerjaSosialMasyarakat $pekerjaSosialMasyarakat, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.pekerja_sosial_masyarakat.edit', [
            'pekerjaSosialMasyarakat' => $pekerjaSosialMasyarakat,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PekerjaSosialMasyarakat $pekerjaSosialMasyarakat)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $pekerjaSosialMasyarakat->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-masyarakat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PekerjaSosialMasyarakat $pekerjaSosialMasyarakat)
    {
        $pekerjaSosialMasyarakat->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-masyarakat.index');
    }

    public function export_pekerja_sosial_masyarakat()
    {
        return Excel::download(new PekerjaSosialMasyarakatExport, 'pekerja-sosial-masyarakat.xlsx');
    }

    public function import_pekerja_sosial_masyarakat(Request $request)
    {
        Excel::import(new PekerjaSosialMasyarakatImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('pekerja-sosial-masyarakat.index');
    }
}
