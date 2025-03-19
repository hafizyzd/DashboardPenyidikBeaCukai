<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        body {
            background-image: url('{{ asset('assets/img/djbc.jpg') }}'); /* Pastikan path benar */
            background-size: cover; /* Gambar menutupi seluruh layar */
            background-position: center; /* Posisi gambar di tengah */
            background-repeat: no-repeat; /* Gambar tidak diulang */
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.8); /* Warna putih dengan transparansi */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="d-flex flex-column vh-100">
    <main class="flex-grow-1">
        @yield('containAuthSys')
    </main>
    <!-- <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div> -->
</body>
</html>