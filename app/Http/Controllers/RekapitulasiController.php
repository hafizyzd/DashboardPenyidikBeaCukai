<?php

namespace App\Http\Controllers;

use App\Exports\RekapitulasiExport;
use App\Imports\RekapitulasiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Rekapitulasi;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    public function index()
    {
        $rekapitulasi = Rekapitulasi::all();
        return view('Admin.dashboard', compact('rekapitulasi'));
    }

    public function rekapitulasiexport(){
        return Excel::download(new RekapitulasiExport,'rekapitulasi.xlsx');
    }

    public function calculateloss(){
        $rekapitulasi = Rekapitulasi::all();
        $totalPotensiKerugian = Rekapitulasi::sum('potensi_kehilangan_penerimaan_negara');
        return view('Admin.dashboard',compact('rekapitulasi','totalPotensiKerugian'));
    }

    //TESTER
    public function rekapitulasiimportexcel(Request $request)
    {
        if ($request->hasFile('file')) { 
            $file = $request->file('file'); 
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

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
