<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Masjid;
use Illuminate\Http\Request;
use App\Exports\MasjidExport;
use App\Imports\MasjidImport;
use App\DataTables\MasjidDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MasjidRequest;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MasjidDataTable $dataTable)
    {
        return $dataTable->render('pages.masjid.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RT $rt, RW $rw)
    {
        return view('pages.masjid.create',[
            'rts' => $rt->all(),
            'rws' => $rw->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MasjidRequest $request)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        Masjid::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('masjid.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Masjid $masjid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Masjid $masjid, RT $rt, RW $rw)
    {
        return view('pages.masjid.edit', [
            'masjid' => $masjid,
            'rts' => $rt->all(),
            'rws' => $rw->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Masjid $masjid)
    {
        $data = $request->all();

        if(!isset($data['no_hp'])){
            $data['no_hp'] = '-';
        }

        $masjid->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah')->autoclose(3000)->toToast();
        return redirect()->route('masjid.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masjid $masjid)
    {
        $masjid->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('masjid.index');
    }

    public function export_masjid()
    {
        return Excel::download(new MasjidExport, 'Data Masjid.xlsx');
    }

    public function import_masjid(Request $request)
    {
        Excel::import(new MasjidImport, $request->file('file'));

        Alert::success('Berhasil', 'Data berhasil diimport')->autoclose(3000)->toToast();
        return redirect()->route('masjid.index');
    }
}
