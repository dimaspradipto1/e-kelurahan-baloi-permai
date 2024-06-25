<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Lk3;
use App\Exports\Lk3Export;
use App\Imports\Lk3Import;;
use Illuminate\Http\Request;
use App\DataTables\Lk3DataTable;
use App\Http\Requests\Lk3Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class Lk3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lk3DataTable $dataTable)
    {
        return $dataTable->render('pages.lk3.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.lk3.create',[
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Lk3Request $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        Lk3::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('lk3.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lk3 $lk3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lk3 $lk3, RT $rt, RW $rw)
    {
        return view('pages.lk3.edit', [
            'lk3' => $lk3,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lk3 $lk3)
    {
        $data = Lk3::FindOrFail($lk3->id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('lk3.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lk3 $lk3)
    {
        $lk3->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('lk3.index');
    }

    public function export_lk3()
    {
        return Excel::download(new Lk3Export, 'lk3.xlsx');
    }

    public function import_lk3()
    {
        Excel::import(new Lk3Import, request()->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('lk3.index');
    }
}
