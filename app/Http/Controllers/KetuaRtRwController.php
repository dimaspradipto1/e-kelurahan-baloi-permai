<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\warga;
use App\Models\KetuaRtRw;
use App\Exports\RtRwExport;
use App\Imports\RtRwImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\KetuaRtRWDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class KetuaRtRwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KetuaRtRWDataTable $dataTable)
    {
        return $dataTable->render('pages.ketuartrw.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw, Warga $warga)
    {
        return view('pages.ketuartrw.create',[
            'warga' => $warga->all(),
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
            $data['no_hp'] = '-';
        }

        KetuaRtRw::create($data);

        Alert::success('Berhasil', 'Data Ketua RT/RW Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('ketua-rt-rw.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KetuaRtRw $ketuaRtRw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KetuaRtRw $ketuaRtRw)
    {
        return view('pages.ketuartrw.edit',[
            'ketuartrw' => $ketuaRtRw,
            'warga' => warga::all(),
            'rts' => RT::all(),
            'rws' => RW::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KetuaRtRw $ketuaRtRw)
    {
        $data = KetuaRtRw::findOrFail($ketuaRtRw->id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data Ketua RT/RW Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('ketua-rt-rw.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KetuaRtRw $ketuaRtRw)
    {
        $data = KetuaRtRw::findOrFail($ketuaRtRw->id);

        $data->delete();

        Alert::success('Berhasil', 'Data Ketua RT/RW Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('ketua-rt-rw.index');
    }

    public function export_ketua_rt_rw()
    {
        return Excel::download(new RtRwExport, 'Ketua RT RW.xlsx');
    }

    public function import_ketua_rt_rw(Request $request)
    {
        Excel::import(new RtRwImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Ketua RT/RW Berhasil Diimport')->autoclose(3000)->toToast();

        return redirect()->route('ketua-rt-rw.index');
    }

}
