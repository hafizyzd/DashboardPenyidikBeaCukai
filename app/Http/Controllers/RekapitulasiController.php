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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255'
        ]);
        
        $search = $request->input('search');
        
        if ($search) {
            $rekapitulasi = Rekapitulasi::where('kantor', 'like', "%$search%")
                ->orWhere('sbp_no', 'like', "%$search%")
                ->orWhere('lp_no', 'like', "%$search%")
                ->orWhere('jenis_pelanggaran', 'like', "%$search%")
                ->orWhere('split_no', 'like', "%$search%")
                ->orWhere('nama_pelanggar', 'like', "%$search%")
                ->orWhere('nik_npwp1', 'like', "%$search%")
                ->orWhere('alternatif_penyelesaian_masalah', 'like', "%$search%")
                ->orWhere('pasal_dilanggar', 'like', "%$search%")
                ->orWhere('lk_no', 'like', "%$search%")
                ->orWhere('sptp_no', 'like', "%$search%")
                ->orWhere('spdp_no', 'like', "%$search%")
                ->orWhere('nama_tsk', 'like', "%$search%")
                ->orWhere('nik_npwp2', 'like', "%$search%")
                ->orWhere('status_proses', 'like', "%$search%")
                ->orWhere('perkiraan_nilai_barang', 'like', "%$search%")
                ->orWhere('potensi_kehilangan_penerimaan_negara', 'like', "%$search%")
                ->orWhere('nama_pengguna_jasa', 'like', "%$search%")
                ->orWhere('npwp_pengguna_jasa', 'like', "%$search%")
                ->orWhere('kode_komoditi', 'like', "%$search%")
                ->orWhere('jenis', 'like', "%$search%")
                ->orWhere('ba_pencacahan_no', 'like', "%$search%")
                ->orWhere('kep_bdn_no', 'like', "%$search%")
                ->orWhere('kep_bmn_no', 'like', "%$search%")
                ->orWhere('tap_sita_no', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
                ->paginate(30);
        } else {
            $rekapitulasi = Rekapitulasi::all();
        }

        // $rekapitulasi = Rekapitulasi::all();
        $totalPotensiKerugian = Rekapitulasi::sum('potensi_kehilangan_penerimaan_negara');
        $jumlahTersangka = Rekapitulasi::whereNotIn('nama_pelanggar', ['Tidak dikenal','tidak dikenal', '-'])->count();
        $statusProses = Rekapitulasi::whereNotIn('status_proses', [' ', '-'])->count();

        return view('Admin.dashboard', compact('rekapitulasi', 'totalPotensiKerugian', 'jumlahTersangka','statusProses','search'));
    }

    public function rekapitulasiexport(){
        return Excel::download(new RekapitulasiExport,'rekapitulasi.xlsx');
    }
    
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
