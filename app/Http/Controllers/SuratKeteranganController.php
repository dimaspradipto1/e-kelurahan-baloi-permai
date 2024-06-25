<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\SuratKeterangan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuratKeteranganExport;
use App\Imports\SuratKeteranganImport;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\SuratKeteranganDataTable;

class SuratKeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SuratKeteranganDataTable $dataTable)
    {
        return $dataTable->render('pages.suratketerangan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Warga $warga)
    {
        return view('pages.suratketerangan.create',[
            'warga' => $warga->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        SuratKeterangan::create($data);

        Alert::success('success','Data Berhasil di tambahkan')->autoclose(3000)->toToast();
        return redirect(route('surat-keterangan.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeterangan $suratKeterangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeterangan $suratKeterangan, Warga $warga)
    {
        return view('pages.suratketerangan.edit',[
            'suratKeterangan' => $suratKeterangan,
            'warga' => $warga->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeterangan $suratKeterangan)
    {
        $data = $request->all();
        $suratKeterangan->update($data);

        Alert::success('success','Data Berhasil di ubah')->autoclose(3000)->toToast();
        return redirect(route('surat-keterangan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeterangan $suratKeterangan)
    {
        $suratKeterangan->delete();

        Alert::success('success','Data Berhasil di hapus')->autoclose(3000)->toToast();
        return redirect(route('surat-keterangan.index'));
    }

    public function export_surat_keterangan()
    {
        return Excel::download(new SuratKeteranganExport, 'Surat Keterangan.xlsx');
    }

    public function import_surat_keterangan(REquest $request)
    {
        Excel::import(new SuratKeteranganImport, $request->file('file'));

        Alert::success('success','Data Berhasil di import')->autoclose(3000)->toToast();
        return redirect(route('surat-keterangan.index'));
    }

}
