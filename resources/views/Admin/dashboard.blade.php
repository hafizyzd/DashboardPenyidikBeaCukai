<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="{{ asset('assets/img/logo_bea.png') }}" />
        <title>Dashboard Penyidikan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=lab_profile" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark fixed-top">
            <!-- Navbar Brand--> 
            <a class="navbar-brand ps-3" href="">CIIS</a>
            <!-- Sidebar Toggle--> 
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- sidebar -->
        <div class="row" style="height: 100vh;">
            <div class="col-2" style="margin: top 100px;">
                <!-- Sidebar -->
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu" style="margin-top: 60px">
                            <div class="nav">
                                <div class="side-nav-heading m-1"><p style="text-transform: uppercase;color: #f8f9fa">Custom Investigation Integration System</p></div>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>   
                                <!-- Pelaporan Item with Nested Links below -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><span class="material-symbols-outlined">lab_profile</span></div>
                                    Pelaporan
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="#">Submit Data Laporan</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            <p class="mb-0 fw-bold text-3xl text-white">Budi Pekerti</p>
                            <p class="mb-11" style="font-size:12px">Subdirektorat Penindakan dan Penyidikan</p>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- content -->
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
                                    <div class="card bg-primary text-white mb-4 text-center">
                                        <div class="card-body">Jumlah Penyidik</div>
                                        <div> <h3>1440</h3> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4 text-center">
                                        <div class="card-body">Potensi Kerugian Negara</div>
                                        <div> <h3>Rp 66.030.401.000</h3> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4 text-center">
                                        <div class="card-body">Dalam Proses Penyidikan</div>
                                        <div> <h3>46</h3> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4 text-center">
                                        <div class="card-body">Tersangka</div>
                                        <div> <h3>230</h3> </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-pie me-1"></i>
                                            Tindak Pidana
                                        </div>
                                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Jumlah PDP
                                        </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header thick">
                                    <i class="fas fa-table me-1"></i>
                                    Rekapitulasi Penyidikan
                                </div>
                                <div class="ms-3 mt-2"><a href="{{ route('exportrekapitulasi')}}" class="btn btn-success">Export Data Excel</a></div>
                                <div class="card-body">
                                <div class="table-container mt-1">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
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
                                                    <td>{{ $item->split_no }}</td>
                                                    <td>{{ $item->split_tgl }}</td>
                                                    <td>{{ $item->jenis_pelanggaran }}</td>
                                                    <td>{{ $item->nama_pelanggaran }}</td>
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
                                                    <td>{{ $item->ba_pecahan_no }}</td>
                                                    <td>{{ $item->ba_pecahan_tgl }}</td>
                                                    <td>{{ $item->kep_bdn_no }}</td>
                                                    <td>{{ $item->kp_bdn_tgl }}</td>
                                                    <td>{{ $item->kep_bmn_no }}</td>
                                                    <td>{{ $item->kp_bmn_tgl }}</td>
                                                    <td>{{ $item->tap_sita_no }}</td>
                                                    <td>{{ $item->tap_sita_tgl }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->proses }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Subdirektorat Penyidikan Bea dan Cukai 2025</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
         </div>
         
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
    </body>
    <style>
               /* Sidebar Styles */
    #layoutSidenav_nav {
        background-color: #343a40;
        height: 100vh; /* Sidebar takes full height of the viewport */
        position: fixed; /* Keep sidebar fixed on the left */
        top: 0; /* Align to the top */
        bottom: 100; /* Align to the bottom */
        width: 250px; /* Sidebar width */
        overflow-y: auto; /* Allow scrolling if the content exceeds height */
    }

    /* Styling for the Sidebar Links */
    .nav-link {
        color: #f8f9fa !important;
        font-size: 1rem;
    }

    .nav-link:hover {
        background-color: #495057;
        color: #fff !important;
    }

    .sb-nav-link-icon {
        color: #adb5bd;
    }

    /* Footer Styles */
    .sb-sidenav-footer {
        background-color: #23272b;
        color: #868e96;
        font-size: 0.9rem;
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
    }

    /* Membuat tabel bisa digulir secara vertikal */
    .table-container {
        max-height: 400px; /* Atur tinggi sesuai kebutuhan */
        overflow-y: auto; /* Menambahkan scroll vertical */
        display: block; /* Pastikan elemen menjadi block agar overflow bekerja */
    }

    .thick {
        font-weight: bold;
    }
    

    </style>
</html>