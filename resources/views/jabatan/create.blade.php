@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header mb-3">Buat Laporan</div>
                    <div class="card-body p-4">
                        @include('layouts._flash')
                        <form class="row g-2" action="{{ route('jabatan.store') }}" method="post">
                            @csrf
                            <div class="mb-3 col-12">
                                <label for="">Jabatan Baru</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-4 container">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" id="tombol" onclick="Swal('Data Ditambahkan', 'Data Telah Di Tambahkan', 'success')">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
