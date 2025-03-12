<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekapitulasis', function (Blueprint $table) {
            $table->id();
            $table->string('kantor', 200);
            $table->string('sbp_no',150);
            $table->date('sbp_tgl');
            $table->string('lp_no', 150);
            $table->date('lp_tgl');
            $table->string('split_no', 150);
            $table->date('split_tgl');
            $table->string('jenis_pelanggaran', 200);
            $table->string('nama_pelanggaran', 255);
            $table->string('nik_npwp1', 250);
            $table->string('alternatif_penyelesaian_masalah', 250);
            $table->string('pasal_dilanggar', 255);
            $table->string('lk_no', 200);
            $table->string('sptp_no', 200);
            $table->date('sptp_tgl');
            $table->string('spdp_no', 200);
            $table->date('spdp_tgl');
            $table->string('nama_tsk', 255);
            $table->string('nik_npwp2', 255);
            $table->string('status_proses', 100);
            $table->bigInteger('perkiraan_nilai_barang');
            $table->bigInteger('potensi_kehilangan_penerimaan_negara');
            $table->string('nama_pengguna_jasa', 255);
            $table->string('npwp_pengguna_jasa', 200);
            $table->string('kode_komoditi', 100);
            $table->string('jenis', 100);
            $table->integer('jumlah');
            $table->string('satuan',50);
            $table->string('ba_pecahan_no', 150);
            $table->date('ba_pecahan_tgl');
            $table->string('kep_bdn_no', 150);
            $table->date('kp_bdn_tgl');
            $table->string('kep_bmn_no', 150);
            $table->date('kp_bmn_tgl');
            $table->string('tap_sita_no', 150);
            $table->date('tap_sita_tgl');
            $table->string('status', 100);
            $table->string('proses', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekapitulasis');
    }
};
