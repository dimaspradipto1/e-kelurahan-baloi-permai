<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Warga;
use App\Models\Tagana;
use Illuminate\Http\Request;
use App\Exports\TaganaExport;
use App\Imports\TaganaImport;
use App\DataTables\TaganaDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TaganaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaganaDataTable $dataTable)
    {
        return $dataTable->render('pages.tagana.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.tagana.create', [
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

        if (!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        Tagana::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('tagana.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tagana $tagana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagana $tagana, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.tagana.edit', [
            'tagana' => $tagana,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tagana $tagana)
    {
        $data = $request->all();

        if (!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        $tagana->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('tagana.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagana $tagana)
    {
        $tagana->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('tagana.index');
    }

    public function export_tagana()
    {
        return Excel::download(new TaganaExport, 'tagana.xlsx');
    }

    public function import_tagana(Request $request)
    {
        Excel::import(new TaganaImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('tagana.index');
    }
}
