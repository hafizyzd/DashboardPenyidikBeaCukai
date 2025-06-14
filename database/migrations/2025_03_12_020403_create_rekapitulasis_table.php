<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekapitulasis', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->string('kantor', 200)->nullable();
            $table->string('sbp_no',150)->nullable();
            $table->date('sbp_tgl')->nullable();  
            $table->string('lp_no', 150)->nullable();
            $table->date('lp_tgl')->nullable();  
            $table->string('split_no', 150)->nullable();
            $table->date('split_tgl')->nullable();  
            $table->string('jenis_pelanggaran', 200)->nullable();
            $table->string('nama_pelanggar', 255)->nullable();
            $table->string('nik_npwp1', 250)->nullable();
            $table->string('alternatif_penyelesaian_masalah', 250)->nullable();
            $table->longText('pasal_dilanggar')->nullable();
            $table->string('lk_no', 200)->nullable();
            $table->string('sptp_no', 200)->nullable();
            $table->string('sptp_tgl',100)->nullable();  
            $table->string('spdp_no', 200)->nullable();
            $table->string('spdp_tgl',100)->nullable();  
            $table->string('nama_tsk', 255)->nullable();
            $table->string('nik_npwp2', 255)->nullable();
            $table->string('status_proses', 100)->nullable();
            $table->bigInteger('perkiraan_nilai_barang')->nullable();
            $table->bigInteger('potensi_kehilangan_penerimaan_negara')->nullable();
            $table->string('nama_pengguna_jasa', 255)->nullable();
            $table->string('npwp_pengguna_jasa', 200)->nullable();
            $table->string('kode_komoditi', 100)->nullable();
            $table->longText('jenis')->nullable();
            $table->float('jumlah', 8, 2)->nullable();
            $table->string('satuan',50)->nullable();
            $table->string('ba_pencacahan_no', 150)->nullable();
            $table->date('ba_pencacahan_tgl')->nullable();  
            $table->string('kep_bdn_no', 150)->nullable();
            $table->date('kep_bdn_tgl')->nullable();  
            $table->string('kep_bmn_no', 150)->nullable();
            $table->date('kep_bmn_tgl')->nullable();  
            $table->string('tap_sita_no', 150)->nullable();
            $table->date('tap_sita_tgl')->nullable();  
            $table->string('status', 100)->nullable();
            $table->string('proses', 100)->nullable();
            $table->timestamps();
        });
    }
};
