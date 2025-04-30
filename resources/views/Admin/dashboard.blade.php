@extends('Admin.layouts.adminLayouts')
@section('containAdminSys')
        <div class="row" class="col-2 collapse" style="height: 100vh;">
            <div class="col-2" style="margin: top 100px;" >
                @include('Admin.partials.sidebaradmin')
            </div>
            <div class="col-10">
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4" style="margin-top: 65px">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card text-white mb-4 text-center hover-effect shadow" style="background-color:#27548A">
                                        <div class="card-body">Jumlah Penyidik</div>
                                        <div> <h3>1440</h3> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card text-white mb-4 text-center hover-effect shadow" style="background-color:#FCB454">
                                        <div class="card-body">Dalam Proses Penyidikan</div>
                                        <div>
                                            <h3>{{$statusProses}}</h3>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card text-white mb-4 text-center hover-effect shadow" style="background-color:#67AE6E">
                                        <div class="card-body">Potensi Kerugian Negara</div>
                                            <div>
                                                <h3>{{ formatRupiah($totalPotensiKerugian)}}</h3>
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card text-white mb-4 text-center hover-effect shadow" style="background-color:#A62C2C">
                                        <div class="card-body">Tersangka</div>
                                        <div>
                                            <h3>{{ $jumlahTersangka }}</h3>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mb-4 hover-effect shadow">
                                        <div class="card-header">
                                            <i class="fas fa-chart-pie me-1"></i>
                                            Tindak Pidana
                                        </div>
                                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card mb-4 hover-effect shadow">
                                        <div class="card-header">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Jumlah PDP
                                        </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="card mb-4 hover-effect-1 shadow" style="display: flex; flex-direction: column; height: 550px;">
                                <div class="card-header thick">
                                    <i class="fas fa-table me-1"></i>
                                    Rekapitulasi Penyidikan
                                </div>
                                <div class="d-flex p-2">
                                    <div class="ms-3"><a href="{{ route('exportrekapitulasi')}}" class="btn btn-success">Export data excel</a></div>
                                    <div class="ms-3">
                                        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET" action="{{ route('dashboard') }}">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="search" placeholder="Search data..." 
                                                    aria-label="Search for..." aria-describedby="btnNavbarSearch" 
                                                    value="{{ request('search') }}" />
                                                <button class="btn btn-primary" id="btnNavbarSearch" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                @if(request('search'))
                                                    <a href="{{ route('dashboard') }}" class="btn btn-secondary ms-2">Reset</a>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-body" style="flex-grow: 1; padding-bottom: 0; display: flex; flex-direction: column;">
                                @if(request('search') && $rekapitulasi->isEmpty())
                                    <div class="alert alert-info">Tidak ditemukan data yang sesuai dengan pencarian "{{ request('search') }}"</div>
                                @else
                                <div class="table-container">
                                    <table class="table table-sm table-bordered table-hover tableFixHead" >
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Kantor</th>
                                                <th>SBP No</th>
                                                <th>SBP Tanggal</th>
                                                <th>LP/LP1 No</th>
                                                <th>LP/LP1 Tanggal</th>
                                                <th>SPLIT No</th>
                                                <th>SPLIT Tanggal</th>
                                                <th>Jenis Pelanggaran</th>
                                                <th>Nama Pelanggaran</th>
                                                <th>NIK/NPWP</th>
                                                <th>Alternatif Penyelesaian Masalah</th>
                                                <th>Pasal yang dilanggar</th>
                                                <th>No LK</th>
                                                <th>SPTP No</th>
                                                <th>SPTP Tanggal</th>
                                                <th>SPDP No</th>
                                                <th>SPDP Tanggal</th>
                                                <th>Nama Tersangka</th>
                                                <th>NIK/NPWP2</th>
                                                <th>Status Proses</th>
                                                <th>Perkiraan Nilai Barang</th>
                                                <th>Potensi Kehilangan Penerimaan Negara</th>
                                                <th>Nama Pengguna Jasa</th>
                                                <th>NPWP Pengguna Jasa</th>
                                                <th>Kode Komoditi</th>
                                                <th>Jenis</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>BA Pecacahan No</th>
                                                <th>BA Pecacahan Tanggal</th>
                                                <th>Kep BDN No</th>
                                                <th>KP BDN Tanggal</th>
                                                <th>Kep BMN No</th>
                                                <th>KP BMN Tanggal</th>
                                                <th>Tap Sita No</th>
                                                <th>Tap Sita Tanggal</th>
                                                <th>Status</th>
                                                <th>Proses</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rekapitulasi as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->kantor }}</td>
                                                    <td>{{ $item->sbp_no }}</td>
                                                    <td>{{ $item->sbp_tgl }}</td>
                                                    <td>{{ $item->lp_no }}</td>
                                                    <td>{{ $item->lp_tgl }}</td>
                                                    <td>{{ $item->split_no }}</td>
                                                    <td>{{ $item->split_tgl }}</td>
                                                    <td>{{ $item->jenis_pelanggaran}}</td>
                                                    <td>{{ $item->nama_pelanggar }}</td>
                                                    <td>{{ $item->nik_npwp1 }}</td>
                                                    <td>{{ $item->alternatif_penyelesaian_masalah }}</td>
                                                    <td>{{ $item->pasal_dilanggar }}</td>
                                                    <td>{{ $item->lk_no }}</td>
                                                    <td>{{ $item->sptp_no }}</td>
                                                    <td>{{ $item->sptp_tgl }}</td>
                                                    <td>{{ $item->spdp_no }}</td>
                                                    <td>{{ $item->spdp_tgl }}</td>
                                                    <td>{{ $item->nama_tsk }}</td>
                                                    <td>{{ $item->nik_npwp2 }}</td>
                                                    <td>{{ $item->status_proses }}</td>
                                                    <td>{{ $item->perkiraan_nilai_barang }}</td>
                                                    <td>{{ $item->potensi_kehilangan_penerimaan_negara }}</td>
                                                    <td>{{ $item->nama_pengguna_jasa }}</td>
                                                    <td>{{ $item->npwp_pengguna_jasa }}</td>
                                                    <td>{{ $item->kode_komoditi }}</td>
                                                    <td>{{ $item->jenis }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>{{ $item->satuan }}</td>
                                                    <td>{{ $item->ba_pencacahan_no }}</td>
                                                    <td>{{ $item->ba_pencacahan_tgl }}</td>
                                                    <td>{{ $item->kep_bdn_no }}</td>
                                                    <td>{{ $item->kep_bdn_tgl }}</td>
                                                    <td>{{ $item->kep_bmn_no }}</td>
                                                    <td>{{ $item->kep_bmn_tgl }}</td>
                                                    <td>{{ $item->tap_sita_no }}</td>
                                                    <td>{{ $item->tap_sita_tgl }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->proses }}</td>
                                                    <td class="text-center">    
                                                        <form action="{{ route('rekapitulasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class=" btn btn-sm m-1 text-white" style="background-color:#FF6363">Delete</button>
                                                        </form>
                                                        <a href="{{ route('rekapitulasi.edit', $item->id) }}" class="btn btn-sm text-white m-1" style="width: 55px; background-color:#FFA55D">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if(request('search') && $rekapitulasi->hasPages())
                                        <nav aria-label="Page navigation">
                                            <div class="d-flex justify-content-center">
                                                {{ $rekapitulasi->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                                            </div>
                                        </nav>
                                    @endif
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </main>
                    @include('Admin.partials.footeradmin')
                </div>
            </div>
         </div>
         

    </body>
@endsection