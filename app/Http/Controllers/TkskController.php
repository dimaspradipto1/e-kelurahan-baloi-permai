<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Tksk;
use App\Exports\TkskExport;
use App\Imports\TkskImport;
use Illuminate\Http\Request;
use App\DataTables\TkskDataTables;
use App\Http\Requests\TkskRequest;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TkskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TkskDataTables $datatable)
    {
        return $datatable->render('pages.tksk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tksk $tksk, Rt $rt, Rw $rw)
    {
        return view('pages.tksk.create', [
            'tksk' => $tksk,
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TkskRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        Tksk::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('tksk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tksk $tksk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tksk $tksk, Rt $rt, Rw $rw)
    {
        return view('pages.tksk.edit', [
            'tksk' => $tksk,
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tksk $tksk)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $tksk->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('tksk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tksk $tksk)
    {
        $tksk->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('tksk.index');
    }

    public function export_tksk()
    {
        return Excel::download(new TkskExport, 'tksk.xlsx');
    }

    public function import_tksk()
    {
        Excel::import(new TkskImport, request()->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('tksk.index');
    }
}
