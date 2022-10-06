@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Data Pegawai</div>

                    <div class="card-body">
                        <form action="{{ route('guru.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Lapor Lembur</label>
                                <input type="text" name="laporlembur" class="form-control @error('laporlembur') is-invalid @enderror"></input>
                                @error('laporlembur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Jam Masuk</label>
                                <input type="time" name="jammasuk" class="form-control @error('jammasuk') is-invalid @enderror"></input>
                                @error('jammasuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Jam Keluar</label>
                                <input type="time" name="jamkeluar" class="form-control @error('jamkeluar') is-invalid @enderror"></input>
                                @error('jamkeluar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"></input>
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Lembur</label>
                                <input type="jenislembur" name="jenislembur" class="form-control @error('jenislembur') is-invalid @enderror"></input>
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