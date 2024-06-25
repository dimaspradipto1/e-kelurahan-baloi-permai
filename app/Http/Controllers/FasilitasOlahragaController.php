<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use Illuminate\Http\Request;
use App\Models\FasilitasOlahraga;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FasilitasOlahragaExport;
use App\Imports\FasilitasOlahragaImport;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\FasilitasOlahragaDataTable;
use App\Http\Requests\FasilitasOlahragaRequest;

class FasilitasOlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FasilitasOlahragaDataTable $dataTable)
    {
        return $dataTable->render('pages.fasilitas_olahraga.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.fasilitas_olahraga.create', [
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FasilitasOlahragaRequest $request)
    {
        $data = $request->all();

        if (!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        FasilitasOlahraga::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('fasilitas-olahraga.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FasilitasOlahraga $fasilitasOlahraga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FasilitasOlahraga $fasilitasOlahraga, RT $rt, RW $rw)
    {
        return view('pages.fasilitas_olahraga.edit', [
            'fasilitas_olahraga' => $fasilitasOlahraga,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FasilitasOlahraga $fasilitasOlahraga)
    {
        $data = $request->all();

        if (!isset($data['no_hp'])) {
            $data['no_hp'] = '-';
        }

        $fasilitasOlahraga->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('fasilitas-olahraga.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FasilitasOlahraga $fasilitasOlahraga)
    {
        $fasilitasOlahraga->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('fasilitas-olahraga.index');
    }

    public function export_fasilitas_olahraga()
    {
        return Excel::download(new FasilitasOlahragaExport, 'Data Fasilitas Olahraga.xlsx');
    }

    public function import_fasilitas_olahraga(Request $request)
    {
        Excel::import(new FasilitasOlahragaImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('fasilitas-olahraga.index');
    }
}
