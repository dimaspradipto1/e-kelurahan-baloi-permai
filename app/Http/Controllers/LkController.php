<?php

namespace App\Http\Controllers;

use App\Models\Lk;
use App\Models\RT;
use App\Models\RW;
use App\Exports\LkExport;
use App\Imports\LkImport;
use Illuminate\Http\Request;
use App\DataTables\lkDataTable;
use App\Http\Requests\LkRequest;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class LkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(lkDataTable $dataTable)
    {
        return $dataTable->render('pages.lks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.lks.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LkRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        Lk::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('lks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lk $lk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lk $lk, RT $rt, RW $rw)
    {
        return view('pages.lks.edit', [
            'lk' => $lk,
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lk $lk)
    {
        $data = Lk::FindOrFail($lk->id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('lks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lk $lk)
    {
        $lk->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('lks.index');
    }

    public function export_lk()
    {
        return Excel::download(new LkExport, 'Lks.xlsx');
    }

    public function import_lk()
    {
        Excel::import(new LkImport, request()->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('lks.index');
    } 
}
