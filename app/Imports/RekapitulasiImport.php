<?php

namespace App\Imports;

use App\Models\Rekapitulasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RekapitulasiImport implements ToModel
{
    public function model(array $row)
    {
        // Fungsi untuk mengonversi tanggal serial Excel atau format teks ke format MySQL
        $convertDate = function ($excelDate) {
            if (empty($excelDate)) {
                return null; 
            }

            if (is_numeric($excelDate)) {
                return Carbon::instance(Date::excelToDateTimeObject($excelDate))->toDateString();
            }

            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $excelDate)) {
                return $excelDate;
            }

            return null;
        };

        $cleanCurrency = function ($value) {
            if (empty($value)) {
                return 0; 
            }

            $cleanedValue = str_replace(['Rp', ','], '', $value);

            if (strpos($cleanedValue, '=') === 0) {
                return 0; 
            }
            
            return (int) $cleanedValue;
        };

        return new Rekapitulasi([
            'kantor' => $row[1],
            'sbp_no' => $row[2],
            'sbp_tgl' => $convertDate($row[3]), 
            'lp_no' => $row[4],
            'lp_tgl' => $convertDate($row[5]), 
            'split_no' => $row[6],
            'split_tgl' => $convertDate($row[7]), 
            'jenis_pelanggaran' => $row[8],
            'nama_pelanggaran' => $row[9],
            'nik_npwp1' => $row[10],
            'alternatif_penyelesaian_masalah' => $row[11],
            'pasal_dilanggar' => $row[12],
            'lk_no' => $row[13],
            'sptp_no' => $row[14],
            'sptp_tgl' => $convertDate($row[15]), 
            'spdp_no' => $row[16],
            'spdp_tgl' => $convertDate($row[17]), 
            'nama_tsk' => $row[18],
            'nik_npwp2' => $row[19],
            'status_proses' => $row[20],
            'perkiraan_nilai_barang' => $cleanCurrency($row[21]), 
            'potensi_kehilangan_penerimaan_negara' => $cleanCurrency($row[22]), 
            'nama_pengguna_jasa' => $row[23],
            'npwp_pengguna_jasa' => $row[24],
            'kode_komoditi' => $row[25],
            'jenis' => $row[26],
            'jumlah' => $row[27], 
            'satuan' => $row[28],
            'ba_pecahan_no' => $row[29],
            'ba_pecahan_tgl' => $convertDate($row[30]), 
            'kep_bdn_no' => $row[31],
            'kp_bdn_tgl' => $convertDate($row[32]), 
            'kep_bmn_no' => $row[33],
            'kp_bmn_tgl' => $convertDate($row[34]), 
            'tap_sita_no' => $row[35],
            'tap_sita_tgl' => $convertDate($row[36]), 
            'status' => $row[37],
            'proses' => $row[38],
        ]);
    }
}