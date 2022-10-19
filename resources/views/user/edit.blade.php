@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12" width="100%">
            <div class="card">
                <div class="card-header">
                    Data User
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nip">NIP</label>
                            <input type="text" class="form-control  @error('nip') is-invalid @enderror" name="nip">
                            @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="level">Level</label>
                            <select name="level" id="" class="form-control  @error('level') is-invalid @enderror">
                                <option value="User" default>User</option>
                                <option value="Dosen">Dosen</option>
                            </select>
                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label">Foto Mobil</label>
                            @if (isset($mobil) && $mobil->foto)
                            <p>
                                <img src="{{ asset('images/mobil/'). $mobil->foto }}" class="img-rounded img-responsive"
                        style="width: 75px; height: 75px">
                        </p>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ $mobil->nama }}">
                        @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div> --}}
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
