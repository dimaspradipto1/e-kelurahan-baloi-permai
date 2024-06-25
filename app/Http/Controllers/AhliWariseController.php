<?php

namespace App\Http\Controllers;

use App\Models\AhliWarise;
use Illuminate\Http\Request;
use App\Imports\AhliWarisImport;
use App\Exports\AhliWariseExport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\AhliWariseDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class AhliWariseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AhliWariseDataTable $dataTable)
    {
        return $dataTable->render('pages.ahliwaris.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ahliwaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        AhliWarise::create($data);

        Alert::success('success','Data Berhasil di tambahkan')->autoclose(3000)->toToast();
        return redirect(route('ahli-waris.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AhliWarise $ahliWarise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AhliWarise $ahliWari)
    {
        return view('pages.ahliwaris.edit', compact('ahliWari'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AhliWarise $ahliWari)
    {
        $ahliWaris = AhliWarise::findOrFail($ahliWari->id);
        $ahliWaris->update($request->all());

        Alert::success('success','Data Berhasil di ubah')->autoclose(3000)->toToast();
        return redirect(route('ahli-waris.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AhliWarise $ahliWari)
    {
        $ahliWaris = AhliWarise::findOrFail($ahliWari->id);
        $ahliWaris->delete();

        Alert::success('success','Berhasil di hapus')->autoclose(3000)->toToast();
        return redirect(route('ahli-waris.index'));
    }

    public function export_ahli_waris()
    {
        return Excel::download(new AhliWariseExport, 'ahli waris.xlsx');
    }

    public function import_ahli_waris(Request $request)
    {
        Excel::import(new AhliWarisImport, $request->file('file'));

        Alert::success('success','Data Berhasil di import')->autoclose(3000)->toToast();
        return redirect(route('ahli-waris.index'));
    }
}
