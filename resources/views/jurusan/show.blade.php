@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Jurusan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Mata Pelajaran</label>
                            <input type="text" class="form-control " name="kode_mp" value="{{ $jurusan->kode_mp }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control " name="nama_mp" value="{{ $jurusan->nama_mp }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <input type="text" class="form-control" name="semester" value="{{ $jurusan->semester }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jurusan</label>
                            <textarea class="form-control" name="jurusan" readonly>{{ $jurusan->jurusan }}</textarea>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('jurusan.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
