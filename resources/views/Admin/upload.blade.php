@extends('Admin.layouts.adminLayouts')
@section('containAdminSys')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <strong>Upload File Excel</strong>
            </div>
            <div class="card-body">
                <h1>help</h1>
                <!-- <form action="{{ route('excel.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="excelFile">Pilih File Excel (XLSX/XLS)</label>
                        <input type="file" class="form-control" name="excelFile" id="excelFile" accept=".xlsx,.xls" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Unggah File</button>
                </form>

                
                <a href="{{ route('excel.downloadTemplate') }}" class="btn btn-secondary mt-3">Download Template Excel</a>

                @if(session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger mt-4">
                        {{ session('error') }}
                    </div>
                @endif -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection