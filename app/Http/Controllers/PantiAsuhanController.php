<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\PantiAsuhan;
use Illuminate\Http\Request;
use App\Exports\PantiAsuhanExport;
use App\Imports\PantiAsuhanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\PantiAsuhanDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class PantiAsuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PantiAsuhanDataTable $dataTable)
    {
        return $dataTable->render('pages.panti_asuhan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Rt $rt , Rw $rw)
    {
        return view('pages.panti_asuhan.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = 0;
        }

        PantiAsuhan::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('panti-asuhan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PantiAsuhan $pantiAsuhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PantiAsuhan $pantiAsuhan, Rt $rt, Rw $rw)
    {
        return view('pages.panti_asuhan.edit', [
            'panti' => $pantiAsuhan,
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PantiAsuhan $pantiAsuhan)
    {
        $pantiAsuhan = PantiAsuhan::findOrFail($pantiAsuhan->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = 0;
        }

        $pantiAsuhan->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('panti-asuhan.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PantiAsuhan $pantiAsuhan)
    {
        $pantiAsuhan->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('panti-asuhan.index');
    }

    public function export_panti_asuhan()
    {
        return Excel::download(new PantiAsuhanExport, 'panti-asuhan.xlsx');
    }

    public function import_panti_asuhan(Request $request)
    {
        Excel::import(new PantiAsuhanImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('panti-asuhan.index');
    }    
    
}
