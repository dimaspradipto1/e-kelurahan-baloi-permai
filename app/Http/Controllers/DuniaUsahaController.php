<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\DuniaUsaha;
use Illuminate\Http\Request;
use App\Exports\DuniaUsahaExport;
use App\Imports\DuniaUsahaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\DuniaUsahaDataTable;
use App\Http\Requests\DuniaUsahaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DuniaUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DuniaUsahaDataTable $dataTable)
    {
        return $dataTable->render('pages.dunia_usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.dunia_usaha.create',[
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DuniaUsahaRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        DuniaUsaha::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('dunia-usaha.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DuniaUsaha $duniaUsaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DuniaUsaha $duniaUsaha, RT $rt, RW $rw)
    {
        return view('pages.dunia_usaha.edit',[
            'duniausaha' => $duniaUsaha,
            'rts' => RT::all(),
            'rws' => RW::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DuniaUsaha $duniaUsaha)
    {
        $data = DuniaUsaha::findOrFail($duniaUsaha->id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('dunia-usaha.index');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DuniaUsaha $duniaUsaha)
    {
        $duniaUsaha->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus!')->autoclose(3000)->toToast();
        return redirect()->route('dunia-usaha.index');
    }

    public function export_dunia_usaha()
    {
        return Excel::download(new DuniaUsahaExport, 'dunia-usaha.xlsx');
    }

    public function import_dunia_usaha()
    {
        Excel::import(new DuniaUsahaImport, request()->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport!')->autoclose(3000)->toToast();

        return redirect()->route('dunia-usaha.index');
    }
}
