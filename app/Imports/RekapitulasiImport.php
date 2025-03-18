<?php

namespace App\Imports;

use App\Models\Rekapitulasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // Tambahkan ini
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas; // Untuk menangani rumus
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RekapitulasiImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    public function model(array $row)
    {
        
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
            if (is_numeric($cleanedValue)) {
                return (int) $cleanedValue;
            }
            return 0;
        };

        $cleanNumber = function ($value) {
            if (empty($value)) {
                return 0; 
            } 
            $cleanedValue = str_replace(',', '', $value);
            return (float) $cleanedValue;
        };

        return new Rekapitulasi([
            'kantor' => $row['kantor'], 
            'sbp_no' => $row['sbp_no'], 
            'sbp_tgl' => $convertDate($row['sbp_tgl']), 
            'lp_no' => $row['lp_no'], 
            'lp_tgl' => $convertDate($row['lp_tgl']), 
            'split_no' => $row['split_no'], 
            'split_tgl' => $convertDate($row['split_tgl']), 
            'jenis_pelanggaran' => $row['jenis_pelanggaran'], 
            'nama_pelanggar' => $row['nama_pelanggar'], 
            'nik_npwp1' => $row['nik_npwp1'], 
            'alternatif_penyelesaian_masalah' => $row['alternatif_penyelesaian_masalah'], 
            'pasal_dilanggar' => $row['pasal_dilanggar'], 
            'lk_no' => $row['lk_no'], 
            'sptp_no' => $row['sptp_no'], 
            'sptp_tgl' => $convertDate($row['sptp_tgl']), 
            'spdp_no' => $row['spdp_no'], 
            'spdp_tgl' => $convertDate($row['spdp_tgl']), 
            'nama_tsk' => $row['nama_tsk'], 
            'nik_npwp2' => $row['nik_npwp2'], 
            'status_proses' => $row['status_proses'], 
            'perkiraan_nilai_barang' => $cleanCurrency($row['perkiraan_nilai_barang']), 
            'potensi_kehilangan_penerimaan_negara' => $cleanCurrency($row['potensi_kehilangan_penerimaan_negara']), 
            'nama_pengguna_jasa' => $row['nama_pengguna_jasa'], 
            'npwp_pengguna_jasa' => $row['npwp_pengguna_jasa'], 
            'kode_komoditi' => $row['kode_komoditi'], 
            'jenis' => $row['jenis'], 
            'jumlah' => $cleanNumber($row['jumlah']), 
            'satuan' => $row['satuan'], 
            'ba_pencacahan_no' => $row['ba_pencacahan_no'], 
            'ba_pencacahan_tgl' => $convertDate($row['ba_pencacahan_tgl']), 
            'kep_bdn_no' => $row['kep_bdn_no'], 
            'kep_bdn_tgl' => $convertDate($row['kep_bdn_tgl']), 
            'kep_bmn_no' => $row['kep_bmn_no'], 
            'kep_bmn_tgl' => $convertDate($row['kep_bmn_tgl']), 
            'tap_sita_no' => $row['tap_sita_no'], 
            'tap_sita_tgl' => $convertDate($row['tap_sita_tgl']), 
            'status' => $row['status'], 
            'proses' => $row['proses'], 
        ]);
    }
}