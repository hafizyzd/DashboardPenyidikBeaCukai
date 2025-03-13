<?php

namespace App\Http\Controllers;

use App\Exports\RekapitulasiExport;
use App\Imports\RekapitulasiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Models\Rekapitulasi;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekapitulasi = Rekapitulasi::all();
        //dd('rekapitulasi');
        return view('Admin.dashboard', compact('rekapitulasi'));
    }

    public function rekapitulasiexport(){
        return Excel::download(new RekapitulasiExport,'rekapitulasi.xlsx');
    }

    // public function rekapitulasiimportexcel(Request $request){
    //     $file = $request->file('file');
    //     $namaFile = $file->getClientOriginalName();
    //     $file->move('DataRekapitulasi', $namaFile);

    //     Excel::import(new RekapitulasiImport,public_path('/DataRekapitulasi/'.$namaFile));
    //     return redirect('/Admin.upload');
    // }
    public function rekapitulasiimportexcel(Request $request){
        if ($request->hasFile('excelFile')) { // Sesuaikan dengan nama input file
            $file = $request->file('excelFile'); // Sesuaikan dengan nama input file
            $namaFile = $file->getClientOriginalName();
            $file->move('DataRekapitulasi', $namaFile);
    
            Excel::import(new RekapitulasiImport, public_path('/DataRekapitulasi/'.$namaFile));
            return redirect('/upload')->with('success', 'File berhasil diunggah dan diproses.');
        } else {
            return redirect('/upload')->with('error', 'Tidak ada file yang diunggah.');
        }
    }

    public function upload(){
        return view('Admin.upload');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
