<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\Jalanan;
use Illuminate\Http\Request;
use App\Exports\JalananExport;
use App\Imports\JalananImport;
use App\DataTables\JalananDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class JalananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JalananDataTable $dataTable)
    {
        return $dataTable->render('pages.jalanan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.jalanan.create', [
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
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

        Jalanan::create($data);

        Alert::success('Berhasil', 'Data Berhasil di tambahkan!')->autoclose('3000')->toToast();
        return redirect()->route('jalanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jalanan $jalanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jalanan $jalanan, Warga $warga, Rt $rt, Rw $rw)
    {
        return view('pages.jalanan.edit', [
            'jalanan' => $jalanan,
            'warga' => $warga->all(),
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jalanan $jalanan)
    {
        
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $jalanan->update($data);

        Alert::success('Berhasil', 'Data Berhasil di update!')->autoclose('3000')->toToast();
        return redirect()->route('jalanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jalanan $jalanan)
    {
        $jalanan->delete();

        Alert::success('Berhasil', 'Data Berhasil di hapus!')->autoclose('3000')->toToast();
        return redirect()->route('jalanan.index');
    }

    public function export_jalanan()
    {
        return Excel::download(new JalananExport, 'Data Jalanan.xlsx');
    }

    public function import_jalanan(Request $request)
    {
        Excel::import(new JalananImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil di import!')->autoclose('3000')->toToast();
        return redirect()->route('jalanan.index');
    }
}
