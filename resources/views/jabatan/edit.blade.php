@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts._flash')
                @if ($errors->any())
                    <div class="form-group">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <ul>
                                    <li> {{ $error }} </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="card mt-3">
                    <div class="card-header mb-3">Buat Laporan</div>
                    <div class="card-body p-4">
                        <form class="row g-2" action="{{ route('jabatan.update', $jab->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3 col-12">
                                <label for="">Jabatan Update</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $jab->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-4 container">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" id="tombol"
                                        onclick="Swal('Data Ditambahkan', 'Data Telah Di Tambahkan', 'success')">
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
