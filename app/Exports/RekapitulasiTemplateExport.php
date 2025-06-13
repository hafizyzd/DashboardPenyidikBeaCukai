<?php

namespace App\Exports;

use App\Models\Rekapitulasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapitulasiTemplateExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'kantor',
            'sbp_no',
            'sbp_tgl',
            'lp_no',
            'lp_tgl',
            'split_no',
            'split_tgl',
            'jenis_pelanggaran',
            'nama_pelanggar',
            'nik_npwp1',
            'alternatif_penyelesaian_masalah',
            'pasal_dilanggar',
            'lk_no',
            'sptp_no',
            'sptp_tgl',
            'spdp_no',
            'spdp_tgl',
            'nama_tsk',
            'nik_npwp2',
            'status_proses',
            'perkiraan_nilai_barang',
            'potensi_kehilangan_penerimaan_negara',
            'nama_pengguna_jasa',
            'npwp_pengguna_jasa',
            'kode_komoditi',
            'jenis',
            'jumlah',
            'satuan',
            'ba_pencacahan_no',
            'ba_pencacahan_tgl',
            'kep_bdn_no',
            'kep_bdn_tgl',
            'kep_bmn_no',
            'kep_bmn_tgl',
            'tap_sita_no',
            'tap_sita_tgl',
            'status',
            'proses',
        ];
    }
}
