@extends('Admin.layouts.adminLayouts')

@section('containAdminSys')
<div class="row" style="height: 100vh;">
    <div class="col-2" style="margin-top: 100px;">
        @include('Admin.partials.sidebaradmin')
    </div>
    <!-- content -->
    <div class="col-10">
        <div id="layoutSidenav_content" class="d-flex flex-column" style="min-height: 100vh;">
            <main class="flex-grow-1">
                <div class="card w-75 mb-3 mx-auto shadow-lg hover-effect-1" style="margin-top: 100px;">
                    <div class="card-header text-white" style="background-color: #27548A;">
                        <h5>Edit Rekapitulasi Penyidikan</h5>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('rekapitulasi.update', $rekapitulasi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <input type="hidden" name="id" value="{{ $rekapitulasi->id }}">
                            <div class="mb-3">
                                <label for="kantor" class="form-label">Nama Kantor</label>
                                <input type="text" class="form-control" required="required" name="kantor" value="{{ $rekapitulasi->kantor ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="sbp_no" class="form-label">SBP No</label>
                                <input type="text" class="form-control" required="required" name="sbp_no" value="{{ $rekapitulasi->sbp_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="sbp_tgl" class="form-label">SBP Tanggal</label>
                                <input type="date" class="form-control"  name="sbp_tgl" value="{{ $rekapitulasi->sbp_tgl ? \Carbon\Carbon::parse($rekapitulasi->sbp_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="lp_no" class="form-label">LP/LP1 No</label>
                                <input type="text" class="form-control" required="required" name="lp_no" value="{{ $rekapitulasi->lp_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="lp_tgl" class="form-label">LP/LP1 Tanggal</label>
                                <input type="date" class="form-control" name="lp_tgl" value="{{ $rekapitulasi->lp_tgl ? \Carbon\Carbon::parse($rekapitulasi->lp_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="split_no" class="form-label">SPLIT No</label>
                                <input type="text" class="form-control" required="required" name="split_no" value="{{ $rekapitulasi->split_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="split_tgl" class="form-label">SPLIT Tanggal</label>
                                <input type="date" class="form-control" name="split_tgl" value="{{ $rekapitulasi->split_tgl ? \Carbon\Carbon::parse($rekapitulasi->split_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_pelangaran" class="form-label">Jenis Pelanggaran</label>
                                <input type="text" class="form-control" required="required" name="jenis_pelangaran" value="{{ $rekapitulasi->jenis_pelanggaran ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_pelanggar" class="form-label">Nama Pelanggar</label>
                                <input type="text" class="form-control" required="required" name="nama_pelanggar" value="{{ $rekapitulasi->nama_pelanggar ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="nik_npwp1" class="form-label">NIK NPWP</label>
                                <input type="text" class="form-control" required="required" name="nik_npwp1" value="{{ $rekapitulasi->nik_npwp1 ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="alternatif_penyelesaian_masalah" class="form-label">Alternatif Penyelesaian Masalah</label>
                                <input type="text" class="form-control" required="required" name="alternatif_penyelesaian_masalah" value="{{ $rekapitulasi->alternatif_penyelesaian_masalah ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="pasal_dilanggar" class="form-label">Pasal yang Dilanggar</label>
                                <textarea class="form-control" name="pasal_dilanggar" required="required">{{ $rekapitulasi->pasal_dilanggar ?? '-' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lk_no" class="form-label">No LK</label>
                                <input type="text" class="form-control" required="required" name="lk_no" value="{{ $rekapitulasi->lk_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="sptp_no" class="form-label">SPTP No</label>
                                <input type="text" class="form-control" required="required" name="sptp_no" value="{{ $rekapitulasi->sptp_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="sptp_tgl" class="form-label">SPTP Tanggal</label>
                                <input type="date" class="form-control" value="{{ $rekapitulasi->sptp_tgl ? \Carbon\Carbon::parse($rekapitulasi->sptp_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="spdp_no" class="form-label">SPDP No</label>
                                <input type="text" class="form-control" required="required" name="spdp_no" value="{{ $rekapitulasi->spdp_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="spdp_tgl" class="form-label">SPDP Tanggal</label>
                                <input type="date" class="form-control" name="spdp_tgl"  value="{{ $rekapitulasi->spdp ? \Carbon\Carbon::parse($rekapitulasi->spdp)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_tsk" class="form-label">Nama tersangka</label>
                                <input type="text" class="form-control" required="required" name="nama_tsk" value="{{ $rekapitulasi->nama_tsk ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="nik_npwp2" class="form-label">NIK NPWP</label>
                                <input type="" class="form-control" required="required" name="nik_npwp2" value="{{ $rekapitulasi->nik_npwp2 ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="status_proses" class="form-label">Status proses</label>
                                <input type="text" class="form-control" required="required" name="status_proses" value="{{ $rekapitulasi->status_proses ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="perkiraan_nilai_barang" class="form-label">Perkiraan nilai barang</label>
                                <input type="number" class="form-control" required="required" name="perkiraan_nilai_barang" value="{{ $rekapitulasi->perkiraan_nilai_barang ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="potensi_kehilangan_penerimaan_negara" class="form-label">Potensi kehilangan penerimaan negara</label>
                                <input type="number" class="form-control" required="required" name="potensi_kehilangan_penerimaan_negara" value="{{ $rekapitulasi->potensi_kehilangan_penerimaan_negara ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_pengguna_jasa" class="form-label">Nama pengguna jasa</label>
                                <input type="text" class="form-control" required="required" name="nama_pengguna_jasa" value="{{ $rekapitulasi->nama_pengguna_jasa ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="npwp_pengguna_jasa" class="form-label">NPWP pengguna jasa</label>
                                <input type="text" class="form-control" required="required" name="npwp_pengguna_jasa" value="{{ $rekapitulasi->npwp_pengguna_jasa ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="kode_komoditi" class="form-label">Kode komoditi</label>
                                <input type="text" class="form-control" required="required" name="kode_komoditi" value="{{ $rekapitulasi->kode_komoditi ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <input type="text" class="form-control" required="required" name="jenis" value="{{ $rekapitulasi->jenis ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" required="required" name="jumlah" value="{{ $rekapitulasi->jumlah ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" class="form-control" required="required" name="satuan" value="{{ $rekapitulasi->satuan ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="ba_pencacahan_no" class="form-label">BA pencacahan</label>
                                <input type="text" class="form-control" required="required" name="ba_pencacahan_no" value="{{ $rekapitulasi->ba_pencacahan_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="ba_pencacagan_tgl" class="form-label">BA pencacahan tanggal</label>
                                <input type="date" class="form-control" name="ba_pencacahan_tgl"  value="{{ $rekapitulasi->ba_pencacahan_tgl ? \Carbon\Carbon::parse($rekapitulasi->ba_pencacahan_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="kep_bdn_no" class="form-label">Kep BDN no</label>
                                <input type="text" class="form-control" required="required" name="kep_bdn_no" value="{{ $rekapitulasi->kep_bdn_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="kep_bdn_tgl" class="form-label">Kep BDN tanggal</label>
                                <input type="date" class="form-control" name="kep_bdn_tgl" value="{{ $rekapitulasi->kep_bdn_tgl ? \Carbon\Carbon::parse($rekapitulasi->kep_bdn_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="kep_bmn_no" class="form-label">Kep BMN no</label>
                                <input type="text" class="form-control" required="required" name="kep_bmn_no" value="{{ $rekapitulasi->kep_bmn_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="kep_bmn_tgl" class="form-label">Kep BMN tanggal</label>
                                <input type="date" class="form-control" name="kep_bmn_tgl" value="{{ $rekapitulasi->tap_bmn_tgl ? \Carbon\Carbon::parse($rekapitulasi->ba_pencacahan_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="tap_sita_no" class="form-label">Tap sita no</label>
                                <input type="text" class="form-control" required="required" name="tap_sita_no" value="{{ $rekapitulasi->tap_sita_no ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="tap_sita_tgl" class="form-label">Tap sita tanggal</label>
                                <input type="date" class="form-control" name="tap_sita_tgl" value="{{ $rekapitulasi->tap_sita_tgl ? \Carbon\Carbon::parse($rekapitulasi->tap_sita_tgl)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" required="required" name="status" value="{{ $rekapitulasi->status ?? '-' }}">
                            </div>
                            <div class="mb-3">
                                <label for="proses" class="form-label">Proses</label>
                                <input type="text" class="form-control" required="required" name="proses" value="{{ $rekapitulasi->proses ?? '-' }}">
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" style="background-color: #27548A;" class="btn btn-block text-white">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </main>
            @include('Admin.partials.footeradmin')
        </div>
    </div>
</div>
@endsection
