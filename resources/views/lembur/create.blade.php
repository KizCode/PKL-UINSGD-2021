@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Buat Laporan</div>
                    <div class="card-body">
                        <form action="{{ route('lembur.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kegiatan</label>
                                <input type="text" name="kgtn" value="Lembur"
                                    class="form-control @error('kgtn') is-invalid @enderror"></input>
                                @error('kgtn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div>
                                    <label for="urai">Uraian</label>
                                </div>
                                <textarea name="urai" id="" cols="100" rows="auto" required></textarea>
                                @error('urai')
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
