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
                        <form action="{{ route('rekapitulasi.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $rekapitulasi->id }}">

                            <!-- Form Group for Nama Kantor -->
                            <div class="mb-3">
                                <label for="kantor" class="form-label">Nama Kantor</label>
                                <input type="text" class="form-control" required="required" name="kantor" value="{{ $rekapitulasi->kantor }}">
                            </div>

                            <!-- Form Group for SBP No -->
                            <div class="mb-3">
                                <label for="sbp_no" class="form-label">SBP No</label>
                                <input type="text" class="form-control" required="required" name="sbp_no" value="{{ $rekapitulasi->sbp_no }}">
                            </div>

                            <!-- Form Group for SBP Tanggal -->
                            <div class="mb-3">
                                <label for="sbp_tgl" class="form-label">SBP Tanggal</label>
                                <input type="date" class="form-control" required="required" name="sbp_tgl" value="{{ \Carbon\Carbon::parse($rekapitulasi->sbp_tgl)->format('Y-m-d') }}">
                            </div>

                            <!-- Form Group for LP No -->
                            <div class="mb-3">
                                <label for="lp_no" class="form-label">LP No</label>
                                <input type="text" class="form-control" required="required" name="lp_no" value="{{ $rekapitulasi->lp_no }}">
                            </div>

                            <!-- Form Group for LP Tanggal -->
                            <div class="mb-3">
                                <label for="lp_tgl" class="form-label">LP Tanggal</label>
                                <input type="date" class="form-control" required="required" name="lp_tgl" value="{{ \Carbon\Carbon::parse($rekapitulasi->lp_tgl)->format('Y-m-d') }}">
                            </div>

                            <!-- Form Group for SPLIT No -->
                            <div class="mb-3">
                                <label for="split_no" class="form-label">SPLIT No</label>
                                <input type="text" class="form-control" required="required" name="split_no" value="{{ $rekapitulasi->split_no }}">
                            </div>

                            <!-- Form Group for SPLIT Tanggal -->
                            <div class="mb-3">
                                <label for="split_tgl" class="form-label">SPLIT Tanggal</label>
                                <input type="date" class="form-control" required="required" name="split_tgl" value="{{ \Carbon\Carbon::parse($rekapitulasi->split_tgl)->format('Y-m-d') }}">
                            </div>

                            <!-- Form Group for Jenis Pelanggaran -->
                            <div class="mb-3">
                                <label for="jenis_pelangaran" class="form-label">Jenis Pelanggaran</label>
                                <input type="text" class="form-control" required="required" name="jenis_pelangaran" value="{{ $rekapitulasi->jenis_pelanggar }}">
                            </div>

                            <!-- Form Group for Nama Pelanggar -->
                            <div class="mb-3">
                                <label for="nama_pelanggar" class="form-label">Nama Pelanggar</label>
                                <input type="text" class="form-control" required="required" name="nama_pelanggar" value="{{ $rekapitulasi->nama_pelanggar }}">
                            </div>

                            <!-- Form Group for NIK NPWP -->
                            <div class="mb-3">
                                <label for="nik_npwp1" class="form-label">NIK NPWP</label>
                                <input type="text" class="form-control" required="required" name="nik_npwp1" value="{{ $rekapitulasi->nik_npwp1 }}">
                            </div>

                            <!-- Form Group for Alternatif Penyelesaian Masalah -->
                            <div class="mb-3">
                                <label for="alternatif_penyelesaian_masalah" class="form-label">Alternatif Penyelesaian Masalah</label>
                                <input type="text" class="form-control" required="required" name="alternatif_penyelesaian_masalah" value="{{ $rekapitulasi->alternatif_penyelesaian_masalah }}">
                            </div>

                            <!-- Form Group for Pasal yang dilanggar -->
                            <div class="mb-3">
                                <label for="pasal_dilanggar" class="form-label">Pasal yang Dilanggar</label>
                                <textarea class="form-control" name="pasal_dilanggar" required="required">{{ $rekapitulasi->pasal_dilanggar }}</textarea>
                            </div>

                            <!-- Form Group for No LK -->
                            <div class="mb-3">
                                <label for="lk_no" class="form-label">No LK</label>
                                <input type="text" class="form-control" required="required" name="lk_no" value="{{ $rekapitulasi->lk_no }}">
                            </div>

                            <!-- Form Group for SPTP No -->
                            <div class="mb-3">
                                <label for="sptp_no" class="form-label">SPTP No</label>
                                <input type="text" class="form-control" required="required" name="sptp_no" value="{{ $rekapitulasi->sptp_no }}">
                            </div>

                            <!-- Form Group for SPTP Tanggal -->
                            <div class="mb-3">
                                <label for="sptp_tgl" class="form-label">SPTP Tanggal</label>
                                <input type="date" class="form-control" required="required" name="sptp_tgl" value="{{ $rekapitulasi->sptp_tgl }}">
                            </div>

                            <!-- Form Group for SPDP No -->
                            <div class="mb-3">
                                <label for="spdp_no" class="form-label">SPDP No</label>
                                <input type="text" class="form-control" required="required" name="spdp_no" value="{{ $rekapitulasi->spdp_no }}">
                            </div>

                            <!-- Form Group for SPDP Tanggal -->
                            <div class="mb-3">
                                <label for="spdp_tgl" class="form-label">SPDP Tanggal</label>
                                <input type="date" class="form-control" required="required" name="spdp_tgl" value="{{ $rekapitulasi->spdp_tgl }}">
                            </div>

                            <!-- Add more fields as needed -->

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
