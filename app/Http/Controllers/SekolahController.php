<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Exports\SekolahExport;
use App\Imports\SekolahImport;
use App\DataTables\SekolahDataTable;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\SekolahRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SekolahDataTable $dataTable)
    {
        return $dataTable->render('pages.sekolah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.sekolah.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SekolahRequest $request)
    {
        $data = $request->all();

        Sekolah::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('sekolah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sekolah $sekolah, RT $rt, RW $rw)
    {
        return view('pages.sekolah.edit',[
            'sekolah' => $sekolah,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        $data = Sekolah::FindOrFail($sekolah->id);

        $data = $request->all();

        $sekolah->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('sekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('sekolah.index');
    }

    public function export_sekolah()
    {
        return Excel::download(new SekolahExport, 'Data Sekolah.xlsx');
    }

    public function import_sekolah(Request $request)
    {
        Excel::import(new SekolahImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('sekolah.index');
    }
}
