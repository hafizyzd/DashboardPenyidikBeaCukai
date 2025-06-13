<?php

namespace App\Http\Controllers;

use App\Exports\RekapitulasiTemplateExport;
use App\Exports\RekapitulasiExport;
use App\Imports\RekapitulasiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Rekapitulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

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

        $totalPotensiKerugian = Rekapitulasi::sum('potensi_kehilangan_penerimaan_negara');
        $jumlahTersangka = Rekapitulasi::whereNotIn('nama_pelanggar', ['Tidak dikenal','tidak dikenal', '-'])->count();
        $statusProses = Rekapitulasi::whereNotIn('status_proses', [' ', '-'])->count();
        
        $jenisPelanggaran = Rekapitulasi::select('jenis_pelanggaran', DB::raw('count(*) as count'))
            ->groupBy('jenis_pelanggaran')
            ->pluck('count', 'jenis_pelanggaran');

        $chartData = Rekapitulasi::select('kantor', 
                DB::raw('SUM(potensi_kehilangan_penerimaan_negara) as total_kerugian'),
                DB::raw('SUM(perkiraan_nilai_barang) as total_nilai'))
            ->groupBy('kantor')
            ->get();

         $data = Rekapitulasi::select('kantor', DB::raw('count(nama_pelanggar) as jumlah_pelanggar'))
            ->groupBy('kantor')
            ->get();

        // Mengubah data ke dalam format yang bisa dipakai oleh chart.js
        $labels = $data->pluck('kantor')->toArray();
        $jumlahPelanggar = $data->pluck('jumlah_pelanggar')->toArray();

        
        // Query untuk mengambil jumlah pelanggaran berdasarkan pasal yang dilanggar
        $dataPasal = Rekapitulasi::select('pasal_dilanggar', DB::raw('count(*) as jumlah_pelanggaran'))
            ->groupBy('pasal_dilanggar')
            ->get();

        // Mengubah data ke dalam format yang bisa dipakai oleh chart.js
        $pasalDilanggar = $dataPasal->pluck('pasal_dilanggar')->toArray();
        $jumlahPelanggaranPasal = $dataPasal->pluck('jumlah_pelanggaran')->toArray();


        return view('Admin.dashboard', compact('rekapitulasi', 'totalPotensiKerugian', 'jumlahTersangka','statusProses','search','jenisPelanggaran','chartData','labels','jumlahPelanggar','pasalDilanggar','jumlahPelanggaranPasal'));
    }

    public function rekapitulasiexport(){
        return Excel::download(new RekapitulasiExport,'rekapitulasi.xlsx');
    }
    
    // public function rekapitulasiimportexcel(Request $request)
    // {
    //     if ($request->hasFile('file')) { 
    //         $file = $request->file('file'); 
    //         $namaFile = $file->getClientOriginalName();
    //         $file->move('DataRekapitulasi', $namaFile);
    
    //         Excel::import(new RekapitulasiImport, public_path('/DataRekapitulasi/'.$namaFile));
    //         return redirect('/upload')->with('success', 'File berhasil diunggah dan diproses.');
    //     } else {
    //         return redirect('/upload')->with('error', 'Tidak ada file yang diunggah.');
    //     }
    // }
    public function rekapitulasiimportexcel(Request $request)
    {
        if (!$request->hasFile('file')) {
            return redirect('/upload')->with('error', 'Tidak ada file yang diunggah.');
        }
        try {
            $file = $request->file('file');
            Excel::import(new RekapitulasiImport, $file);
            return redirect('/upload')->with('success', 'File berhasil diunggah dan data berhasil diproses.');
        } catch (Throwable $e) {
            //Jika terjadi error(nama kolom salah, format data salah, dll)
            return redirect('/upload')->with('error', 'Impor Gagal! Pastikan format file dan semua nama kolom sudah sesuai dengan template.');
        }
    }

    public function upload(){
        return view('Admin.upload');
    }

    public function create()
    {
        return view('Admin.tambahLaporan');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kantor' => 'required|string|max:200',
            'sbp_no' => 'nullable|string|max:150',
            'sbp_tgl' => 'nullable|date',
            'lp_no' => 'nullable|string|max:150',
            'lp_tgl' => 'nullable|date',
            'split_no' => 'nullable|string|max:150',
            'split_tgl' => 'nullable|date',
            'jenis_pelanggaran' => 'nullable|string|max:200',
            'nama_pelanggar' => 'nullable|string|max:255',
            'nik_npwp1' => 'nullable|string|max:250',
            'alternatif_penyelesaian_masalah' => 'nullable|string|max:250',
            'pasal_dilanggar' => 'nullable|string',
            'lk_no' => 'nullable|string|max:200',
            'sptp_no' => 'nullable|string|max:200',
            'sptp_tgl' => 'nullable|date',
            'spdp_no' => 'nullable|string|max:200',
            'spdp_tgl' => 'nullable|date',
            'nama_tsk' => 'nullable|string|max:255',
            'nik_npwp2' => 'nullable|string|max:255',
            'status_proses' => 'nullable|string|max:100',
            'perkiraan_nilai_barang' => 'nullable|numeric',
            'potensi_kehilangan_penerimaan_negara' => 'nullable|numeric',
            'nama_pengguna_jasa' => 'nullable|string|max:255',
            'npwp_pengguna_jasa' => 'nullable|string|max:200',
            'kode_komoditi' => 'nullable|string|max:100',
            'jenis' => 'nullable|string',
            'jumlah' => 'nullable|numeric',
            'satuan' => 'nullable|string|max:50',
            'ba_pencacahan_no' => 'nullable|string|max:150',
            'ba_pencacahan_tgl' => 'nullable|date',
            'kep_bdn_no' => 'nullable|string|max:150',
            'kep_bdn_tgl' => 'nullable|date',
            'kep_bmn_no' => 'nullable|string|max:150',
            'kep_bmn_tgl' => 'nullable|date',
            'tap_sita_no' => 'nullable|string|max:150',
            'tap_sita_tgl' => 'nullable|date',
            'status' => 'nullable|string|max:100',
            'proses' => 'nullable|string|max:100',
        ]);

    // Create a new Rekapitulasi record and save it
        Rekapitulasi::create([
            'kantor' => $request->kantor,
            'sbp_no' => $request->sbp_no,
            'sbp_tgl' => $request->sbp_tgl,
            'lp_no' => $request->lp_no,
            'lp_tgl' => $request->lp_tgl,
            'split_no' => $request->split_no,
            'split_tgl' => $request->split_tgl,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'nama_pelanggar' => $request->nama_pelanggar,
            'nik_npwp1' => $request->nik_npwp1,
            'alternatif_penyelesaian_masalah' => $request->alternatif_penyelesaian_masalah,
            'pasal_dilanggar' => $request->pasal_dilanggar,
            'lk_no' => $request->lk_no,
            'sptp_no' => $request->sptp_no,
            'sptp_tgl' => $request->sptp_tgl,
            'spdp_no' => $request->spdp_no,
            'spdp_tgl' => $request->spdp_tgl,
            'nama_tsk' => $request->nama_tsk,
            'nik_npwp2' => $request->nik_npwp2,
            'status_proses' => $request->status_proses,
            'perkiraan_nilai_barang' => $request->perkiraan_nilai_barang,
            'potensi_kehilangan_penerimaan_negara' => $request->potensi_kehilangan_penerimaan_negara,
            'nama_pengguna_jasa' => $request->nama_pengguna_jasa,
            'npwp_pengguna_jasa' => $request->npwp_pengguna_jasa,
            'kode_komoditi' => $request->kode_komoditi,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'ba_pencacahan_no' => $request->ba_pencacahan_no,
            'ba_pencacahan_tgl' => $request->ba_pencacahan_tgl,
            'kep_bdn_no' => $request->kep_bdn_no,
            'kep_bdn_tgl' => $request->kep_bdn_tgl,
            'kep_bmn_no' => $request->kep_bmn_no,
            'kep_bmn_tgl' => $request->kep_bmn_tgl,
            'tap_sita_no' => $request->tap_sita_no,
            'tap_sita_tgl' => $request->tap_sita_tgl,
            'status' => $request->status,
            'proses' => $request->proses,
        ]);

        // Redirect to dashboard with success message
         return redirect()->route('tambah.laporan')->with('success', 'Data berhasil disimpan');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
	    $rekapitulasi = Rekapitulasi::findOrFail($id);
    	return view('Admin.editData',compact('rekapitulasi'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'kantor' => 'required|string|max:200',
            'sbp_no' => 'nullable|string|max:150',
            'sbp_tgl' => 'nullable|date',
            'lp_no' => 'nullable|string|max:150',
            'lp_tgl' => 'nullable|date',
            'split_no' => 'nullable|string|max:150',
            'split_tgl' => 'nullable|date',
            'jenis_pelanggaran' => 'nullable|string|max:200',
            'nama_pelanggar' => 'nullable|string|max:255',
            'nik_npwp1' => 'nullable|string|max:250',
            'alternatif_penyelesaian_masalah' => 'nullable|string|max:250',
            'pasal_dilanggar' => 'nullable|string',
            'lk_no' => 'nullable|string|max:200',
            'sptp_no' => 'nullable|string|max:200',
            'sptp_tgl' => 'nullable|date',
            'spdp_no' => 'nullable|string|max:200',
            'spdp_tgl' => 'nullable|date',
            'nama_tsk' => 'nullable|string|max:255',
            'nik_npwp2' => 'nullable|string|max:255',
            'status_proses' => 'nullable|string|max:100',
            'perkiraan_nilai_barang' => 'nullable|numeric',
            'potensi_kehilangan_penerimaan_negara' => 'nullable|numeric',
            'nama_pengguna_jasa' => 'nullable|string|max:255',
            'npwp_pengguna_jasa' => 'nullable|string|max:200',
            'kode_komoditi' => 'nullable|string|max:100',
            'jenis' => 'nullable|string',
            'jumlah' => 'nullable|numeric',
            'satuan' => 'nullable|string|max:50',
            'ba_pencacahan_no' => 'nullable|string|max:150',
            'ba_pencacahan_tgl' => 'nullable|date',
            'kep_bdn_no' => 'nullable|string|max:150',
            'kep_bdn_tgl' => 'nullable|date',
            'kep_bmn_no' => 'nullable|string|max:150',
            'kep_bmn_tgl' => 'nullable|date',
            'tap_sita_no' => 'nullable|string|max:150',
            'tap_sita_tgl' => 'nullable|date',
            'status' => 'nullable|string|max:100',
            'proses' => 'nullable|string|max:100',
        ]);

        // Retrieve the existing record
        $rekapitulasi = Rekapitulasi::findOrFail($id);

        // Update the record
        $rekapitulasi->update([
            'kantor' => $request->kantor,
            'sbp_no' => $request->sbp_no,
            'sbp_tgl' => $request->sbp_tgl,
            'lp_no' => $request->lp_no,
            'lp_tgl' => $request->lp_tgl,
            'split_no' => $request->split_no,
            'split_tgl' => $request->split_tgl,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'nama_pelanggar' => $request->nama_pelanggar,
            'nik_npwp1' => $request->nik_npwp1,
            'alternatif_penyelesaian_masalah' => $request->alternatif_penyelesaian_masalah,
            'pasal_dilanggar' => $request->pasal_dilanggar,
            'lk_no' => $request->lk_no,
            'sptp_no' => $request->sptp_no,
            'sptp_tgl' => $request->sptp_tgl,
            'spdp_no' => $request->spdp_no,
            'spdp_tgl' => $request->spdp_tgl,
            'nama_tsk' => $request->nama_tsk,
            'nik_npwp2' => $request->nik_npwp2,
            'status_proses' => $request->status_proses,
            'perkiraan_nilai_barang' => $request->perkiraan_nilai_barang,
            'potensi_kehilangan_penerimaan_negara' => $request->potensi_kehilangan_penerimaan_negara,
            'nama_pengguna_jasa' => $request->nama_pengguna_jasa,
            'npwp_pengguna_jasa' => $request->npwp_pengguna_jasa,
            'kode_komoditi' => $request->kode_komoditi,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'ba_pencacahan_no' => $request->ba_pencacahan_no,
            'ba_pencacahan_tgl' => $request->ba_pencacahan_tgl,
            'kep_bdn_no' => $request->kep_bdn_no,
            'kep_bdn_tgl' => $request->kep_bdn_tgl,
            'kep_bmn_no' => $request->kep_bmn_no,
            'kep_bmn_tgl' => $request->kep_bmn_tgl,
            'tap_sita_no' => $request->tap_sita_no,
            'tap_sita_tgl' => $request->tap_sita_tgl,
            'status' => $request->status,
            'proses' => $request->proses,
        ]);

        // Redirect back to the dashboard with success message
        return redirect()->route('dashboard')->with('success', 'Data berhasil diperbarui');
    }



    public function destroy(string $id)
    {
        $rekapitulasi = Rekapitulasi::findOrFail($id);
        $rekapitulasi->delete();
        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus');
    }

    public function downloadTemplate()
    {
        return Excel::download(new RekapitulasiTemplateExport, 'template_rekapitulasi.xlsx');
    }
}
