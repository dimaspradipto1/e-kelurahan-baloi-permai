<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\RW;
use App\Models\Fasum;
use App\Exports\FasumExport;
use App\Imports\FasumImport;
use Illuminate\Http\Request;
use App\DataTables\FasumDataTable;
use App\Http\Requests\FasumRequest;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class FasumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FasumDataTable $dataTable)
    {
        return $dataTable->render('pages.fasum.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.fasum.create',[
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FasumRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        Fasum::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('fasum.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasum $fasum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasum $fasum, RT $rt, RW $rw)
    {
        return view('pages.fasum.edit', [
            'fasum' => $fasum,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasum $fasum)
    {
        $fasum = Fasum::findOrFail($fasum->id);

        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $fasum->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah!!')->autoclose(3000)->toToast();
        return redirect()->route('fasum.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasum $fasum)
    {
        $fasum->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus!!')->autoclose(3000)->toToast();
        return redirect()->route('fasum.index');
    }

    public function export_fasum()
    {
        return Excel::download(new FasumExport, 'Data Fasum.xlsx');
    }

    public function import_fasum(Request $request)
    {
        Excel::import(new FasumImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport!!')->autoclose(3000)->toToast();
        return redirect()->route('fasum.index');
    }
}
