<nav class="sb-topnav navbar navbar-expand fixed-top" style="background-color:#123458">
    <img src="{{ asset('assets/img/Lambang_Bc.png') }}" alt="Logo" style="height: 40px; padding-right: 2px; padding-left: 8px">
    <a class="navbar-brand ps-3" style="color:#ffffff">CIIS</a>
    <button class="btn btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color:#ffffff"><i class="fas fa-bars"></i></button>
    
    <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#ffffff; background-color:transparent;"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('loginuser') }}">Login</a></li>
                <li><hr class="dropdown-divider"/></li>
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
