<div id="layoutSidenav_nav" style="background-color:#EAEAEA">
    <nav class="sb-sidenav accordion" id="sidenavAccordion">
        <div class="sb-sidenav-menu" style="margin-top: 60px">
            <div class="nav">
                <div class="side-nav-heading m-1 text-center">
                    <p style="text-transform: uppercase; color: #000000; font-weight: 600;">Custom Investigation Integration System</p>
                </div>
                <a class="nav-link" href="{{ route('dashboard') }}" style="background-color:#EAEAEA">
                    <div class="d-flex align-items-center" style="height: 30px;">  <!-- Set height for proper vertical alignment -->
                        <div class="sb-nav-link-icon">
                        <span class="material-symbols-outlined">team_dashboard</span>
                        </div>
                        <p style="color:#000000; margin-left: 10px; margin-bottom: 0;">Dashboard</p> <!-- Remove bottom margin of text -->
                    </div>
                </a>  
                <a class="nav-link" href="{{ route('upload') }}" style="background-color:#EAEAEA">
                    <div class="d-flex align-items-center" style="height: 30px;">
                        <div class="sb-nav-link-icon">
                        <span class="material-symbols-outlined">upload_file</span>
                        </div>
                        <p style="color:#000000; margin-left: 10px; margin-bottom: 0;">Upload File Laporan</p>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('tambah.laporan') }}" style="background-color:#EAEAEA">
                    <div class="d-flex align-items-center" style="height: 30px;">
                        <div class="sb-nav-link-icon">
                        <span class="material-symbols-outlined">upload_file</span>
                        </div>
                        <p style="color:#000000; margin-left: 10px; margin-bottom: 0;">Tambah Laporan</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer" style="background-color:#123458">
            <div class="small" style="color:#ffffff">Logged in as:</div>
            @if (Auth::check())
                <p class="mb-0 fw-bold text-3xl" style="color:#ffffff">{{ Auth::user()->name }}</p>
            @endif
            <p class="mb-11" style="font-size:12px; color:#ffffff">Subdirektorat Penindakan dan Penyidikan</p>
        </div>
    </nav>
</div>

