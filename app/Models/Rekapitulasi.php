<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapitulasi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rekapitulasis';
    protected $guarded = ['id'];
    protected $fillable = [
        'kantor', 'sbp_no', 'sbp_tgl', 'lp_no', 'lp_tgl', 'split_no', 'split_tgl', 'jenis_pelanggaran', 
        'nama_pelanggar', 'nik_npwp1', 'alternatif_penyelesaian_masalah', 'pasal_dilanggar', 'lk_no', 
        'sptp_no', 'sptp_tgl', 'spdp_no', 'spdp_tgl', 'nama_tsk', 'nik_npwp2', 'status_proses', 
        'perkiraan_nilai_barang', 'potensi_kehilangan_penerimaan_negara', 'nama_pengguna_jasa', 
        'npwp_pengguna_jasa', 'kode_komoditi', 'jenis', 'jumlah', 'satuan', 'ba_pencacahan_no', 'ba_pencacahan_tgl', 
        'kep_bdn_no', 'kep_bdn_tgl', 'kep_bmn_no', 'kep_bmn_tgl', 'tap_sita_no', 'tap_sita_tgl', 'status', 'proses'
    ];
}
