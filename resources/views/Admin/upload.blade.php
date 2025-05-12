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
                    <div class="card-header text-white" style="background-color: #27548A;">
                        <h5>Upload File Rekapitulasi</h5>
                    </div>

                    <form action="{{ route('importrekapitulasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="m-3">
                            <label for="excelFile" class="form-label">Choose File</label>
                            <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls, .csv" required>
                        </div>
                        <button type="submit" style="background-color:#123458" class="btn m-3 text-white">Upload</button>
                    </form>
                    <div class="m-2">
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
@endsection