@extends('Admin.layouts.adminLayouts')
@section('containAdminSys')
    <div class="container mt-5">
        <h1>Data Rekapitulasi</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kantor</th>
                    <th>SBP No</th>
                    <th>SBP Tanggal</th>
                    <th>LP No</th>
                    <th>LP Tanggal</th>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody>
                @foreach($rekapitulasi as $item)
                    <tr>
                        <td>{{ $item->kantor }}</td>
                        <td>{{ $item->sbp_no }}</td>
                        <td>{{ $item->sbp_tgl }}</td>
                        <td>{{ $item->lp_no }}</td>
                        <td>{{ $item->lp_tgl }}</td>
                        <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection