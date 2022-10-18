@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('sweetalert::alert')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Data Edit</div>

                    <div class="card-body">
                        <form action="{{ route('lembur.update', $lembur->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control @error('name') is-invalid @enderror" readonly></input>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">NIP</label>
                                <input type="text" name="nip" value="{{ Auth::user()->nip }}"
                                    class="form-control @error('nip') is-invalid @enderror" readonly></input>
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Kegiatan</label>
                                <input type="text" name="kgtn"
                                    class="form-control @error('kgtn') is-invalid @enderror" value="Lembur">
                                </input>
                                @error('kgtn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div>
                                    <label for="">Uraian Lembur</label>
                                </div>
                                <textarea class="form-control" name="urai" id="" cols="100" rows="auto" required value={{ $lembur->urai }}></textarea>
                                </input>
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
