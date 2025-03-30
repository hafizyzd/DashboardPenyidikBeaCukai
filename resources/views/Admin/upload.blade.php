@extends('Admin.layouts.adminLayouts')
@section('containAdminSys')
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
                <li><a class="dropdown-item" href="{{ route('loginuser') }}">Login</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
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
                        <a class="nav-link" href="{{ route('dashboard') }}">
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
                                <a class="nav-link" href="{{ route('upload') }}">Kirim Data Laporan</a>
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
        <div id="layoutSidenav_content" class="d-flex flex-column" style="min-height: 100vh;">
            <main class="flex-grow-1">
                <div class="card w-75 mb-3 mx-auto" style="margin-top: 100px;">
                    <div class="card-header">
                        Upload File Rekapitulasi
                    </div>

                    <form action="{{ route('importrekapitulasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="m-3">
                            <label for="excelFile" class="form-label">Choose File</label>
                            <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls, .csv" required>
                        </div>
                        <button type="submit" class="btn btn-primary m-3">Upload</button>
                    </form>
                    <div>
                        @if($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                        @elseif($message =  Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                    </div>

                    <div class="card-footer">
                        <button type="button" class="btn btn-info mx-auto text-white">Download Template Excel Disini</button>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Subdirektorat Penyidikan Bea Cukai 2025</div>
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
@endsection