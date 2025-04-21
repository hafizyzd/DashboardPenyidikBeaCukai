@extends('Admin.layouts.adminLayouts')
@section('containAdminSys')

<div class="row" style="height: 100vh;">
    <div class="col-2" style="margin: top 100px;">
        @include('Admin.partials.sidebaradmin')
    </div>
    <!-- content -->
    <div class="col-10">
        <div id="layoutSidenav_content" class="d-flex flex-column" style="min-height: 100vh;">
            <main class="flex-grow-1">
                <div class="card w-75 mb-3 mx-auto shadow" style="margin-top: 100px;">
                    <div class="card-header thick">
                        Upload File Rekapitulasi
                    </div>

                    <form action="{{ route('importrekapitulasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="m-3">
                            <label for="excelFile" class="form-label">Choose File</label>
                            <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls, .csv" required>
                        </div>
                        <button type="submit" style="background-color:#123458" class="btn m-3 text-white">Upload</button>
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
                        <button type="button" style="background-color:#78B3CE" class="btn mx-auto text-white">Download Template Excel</button>
                    </div>
                </div>
            </main>
            @include('Admin.partials.footeradmin')
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