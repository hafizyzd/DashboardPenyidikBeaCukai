<?php

namespace App\Imports;

use App\Models\Rekapitulasi;
use Maatwebsite\Excel\Concerns\ToModel;

class RekapitulasiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $cleanNumber = function ($value) {
            $cleanedValue = str_replace(['Rp', ',', ' '], '', $value);
            return (float) $cleanedValue;
        };

        return new Rekapitulasi([
            'kantor' => $row[1],
            'sbp_no' => $row[2],
            'sbp_tgl' => $row[3],
            'lp_no' => $row[4],
            'lp_tgl' => $row[5],
            'split_no' => $row[6],
            'split_tgl' => $row[7],
            'jenis_pelanggaran' => $row[8],
            'nama_pelanggaran' => $row[9],
            'nik_npwp1' => $row[10],
            'alternatif_penyelesaian_masalah' => $row[11],
            'pasal_dilanggar' => $row[12],
            'lk_no' => $row[13],
            'sptp_no' => $row[14],
            'sptp_tgl' => $row[15],
            'spdp_no' => $row[16],
            'spdp_tgl' => $row[17],
            'nama_tsk' => $row[18],
            'nik_npwp2' => $row[19],
            'status_proses' => $row[20],
            'perkiraan_nilai_barang' => $cleanNumber($row[21] ?? 0), 
            'potensi_kehilangan_penerimaan_negara' => $cleanNumber($row[22] ?? 0), 
            'nama_pengguna_jasa' => $row[23],
            'npwp_pengguna_jasa' => $row[24],
            'kode_komoditi' => $row[25],
            'jenis' => $row[26],
            'jumlah' => $cleanNumber($row[27] ?? 0), 
            'satuan' => $row[28],
            'ba_pecahan_no' => $row[29],
            'ba_pecahan_tgl' => $row[30],
            'kep_bdn_no' => $row[31],
            'kp_bdn_tgl' => $row[32],
            'kep_bmn_no' => $row[33],
            'kp_bmn_tgl' => $row[34],
            'tap_sita_no' => $row[35],
            'tap_sita_tgl' => $row[36],
            'status' => $row[37],
            'proses' => $row[38],
        ]);
        
    }
}
