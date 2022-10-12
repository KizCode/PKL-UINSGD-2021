@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts._flash')
            <div class="card border-secondary">
                <div class="card-header mb-3">Data Edit</div>

                <div class="card-body">
                    <form action="{{ route('guru.update', $guru->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="">Lapor Lembur</label>
                            <input type="text" name="laporlembur" class="form-control @error('laporlembur') is-invalid @enderror" value="{{ $guru->laporlembur }}">
                            </input>
                            @error('laporlembur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">jam Masuk</label>
                            <input type="time" name="jammasuk" value="{{ $guru->jammasuk }}" class="form-control @error('jammasuk') is-invalid @enderror">
                            @error('jammasuk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Jam Keluar</label>
                            <input type="time" name="jamkeluar" class="form-control @error('jamkeluar') is-invalid @enderror" value="{{ $guru->jamkeluar }}">
                            </input>
                            @error('jamkeluar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ $guru->tanggal }}">
                            </input>
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis Lembur</label>
                            <input type="text" name="jenislembur" class="form-control @error('jenislembur') is-invalid @enderror" value="{{ $guru->jenislembur }}">
                            </input>
                            @error('jenislembur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection