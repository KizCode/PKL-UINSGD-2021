@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts._flash')
                <div class="card mt-3">
                    <div class="card-header mb-3">Buat Pekerjaan</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <form class="row g-2" action="{{ route('pekerjaan.update', $peker->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3 col-12" >
                                <label for="">Judul</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror" value="{{ $peker->name }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12" >
                                <label for="">Pekerjaan</label>
                                <textarea type="text" name="des" cols="30" rows="10"
                                    class="form-control @error('des') is-invalid @enderror" required>{{ $peker->des }}</textarea>
                                @error('des')
                                    <div class="alert alert-danger">{{ $message }}</div>
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
