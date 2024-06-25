<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Pernikahan;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use App\Exports\PernikahanExport;
use App\Imports\PernikahanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\PernikahanDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class PernikahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PernikahanDataTable $pernikahanDataTable)
    {
        return $pernikahanDataTable->render('pages.pernikahan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.pernikahan.create', [
            'rts'=>$rt->all(),
            'rws'=>$rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Pernikahan::create($data);

        Alert::success('success','Data Berhasil di tambahkan')->autoclose(3000)->toToast();
        return redirect(route('pernikahan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pernikahan $pernikahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pernikahan $pernikahan)
    {
        return view('pages.pernikahan.edit', [
            'pernikahan'=>$pernikahan,
            'rts'=>RT::all(),
            'rws'=>RW::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pernikahan $pernikahan)
    {
        $pernikahan->update($request->all());

        Alert::success('success', 'Data berhasil di ubah')->autoclose(3000)->toToast();
        return redirect(route('pernikahan.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pernikahan $pernikahan)
    {
        $pernikahan->delete();

        Alert::success('success', 'Data berhasil di hapus')->autoclose(3000)->toToast();
        return redirect(route('pernikahan.index'));
    }

    public function export_pernikahan()
    {
        return Excel::download(new PernikahanExport, 'Pernikahan.xlsx');
    }

    public function import_pernikahan(Request $request)
    {
        Excel::import(new PernikahanImport, $request->file('file'));

        Alert::success('success', 'Data berhasil di import')->autoclose(3000)->toToast();
        return redirect(route('pernikahan.index'));
    }
}
