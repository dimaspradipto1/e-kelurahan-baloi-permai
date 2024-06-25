<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;
use App\Models\PenyuluhSosial;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenyuluhSosialExport;
use App\Imports\PenyuluhSosialImport;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\PenyuluhSosialDataTable;
use App\Http\Requests\PenyuluhSosialRequest;

class PenyuluhSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenyuluhSosialDataTable $dataTable)
    {
        return $dataTable->render('pages.penyuluh_sosial.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Rt $rt, Rw $rw)
    {
        return view('pages.penyuluh_sosial.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all(), 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenyuluhSosialRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }
        
        PenyuluhSosial::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('penyuluh-sosial.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenyuluhSosial $penyuluhSosial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenyuluhSosial $penyuluhSosial, Rt $rt, Rw $rw)
    {
        return view('pages.penyuluh_sosial.edit', [
            'penyuluhSosial' => $penyuluhSosial,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenyuluhSosial $penyuluhSosial)
    {
        $data = PenyuluhSosial::findOrFail($penyuluhSosial->id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('penyuluh-sosial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenyuluhSosial $penyuluhSosial)
    {

        $penyuluhSosial->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('penyuluh-sosial.index');
    }

    public function export_penyuluh_sosial()
    {
        return Excel::download(new PenyuluhSosialExport, 'penyuluh-sosial.xlsx');
    }

    public function import_penyuluh_sosial()
    {
        Excel::import(new PenyuluhSosialImport, request()->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();

        return redirect()->route('penyuluh-sosial.index');
    }
}
