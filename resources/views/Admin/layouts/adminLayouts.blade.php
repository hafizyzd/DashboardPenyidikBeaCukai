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
        @yield('containAdminSys')
    </body>
    <script>
        document.getElementById('navbarDropdown').addEventListener('click', function (e) {
            e.preventDefault();
            var dropdown = new bootstrap.Dropdown(this);
            dropdown.toggle();
        });
    </script>
    <style>
              
    #layoutSidenav_nav {
        background-color: #343a40;
        height: 100vh; 
        position: fixed; 
        top: 0; 
        bottom: 100;
        width: 250px; 
        overflow-y: auto;
    }

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

    .sb-sidenav-footer {
        background-color: #23272b;
        color: #868e96;
        font-size: 0.9rem;
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
    }

    .table-container {
        max-height: 400px; 
        overflow-y: auto; 
        display: block; 
    }

    .thick {
        font-weight: bold;
    }
    

    </style>
    <style>
    /* Custom Pagination for Bootstrap 5.3.3 */
    .pagination {
        --bs-pagination-padding-x: 1.2rem;
        --bs-pagination-padding-y: 0.6rem;
        --bs-pagination-font-size: 1rem;
        --bs-pagination-color: var(--bs-primary);
        --bs-pagination-bg: #fff;
        --bs-pagination-border-width: 1px;
        --bs-pagination-border-color: #dee2e6;
        --bs-pagination-border-radius: 0.5rem;
        --bs-pagination-hover-color: var(--bs-primary);
        --bs-pagination-hover-bg: #e9ecef;
        --bs-pagination-hover-border-color: #dee2e6;
        --bs-pagination-focus-color: var(--bs-primary);
        --bs-pagination-focus-bg: #e9ecef;
        --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        --bs-pagination-active-color: #fff;
        --bs-pagination-active-bg: var(--bs-primary);
        --bs-pagination-active-border-color: var(--bs-primary);
        --bs-pagination-disabled-color: #6c757d;
        --bs-pagination-disabled-bg: #fff;
        --bs-pagination-disabled-border-color: #dee2e6;
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .page-item:not(:first-child) .page-link {
        margin-left: 0.5rem;
    }

    .page-item:first-child .page-link,
    .page-item:last-child .page-link {
        border-radius: 0.5rem;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
    }
</style>
</html>