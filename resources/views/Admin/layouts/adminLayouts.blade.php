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
</html>