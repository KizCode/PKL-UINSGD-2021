@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8" width="100%">
                <div class="card mt-3">
                    <div class="card-header">
                        Data User
                    </div>
                    <div class="card-body p-4">
                        <form class="row g-2 form-floating" action="{{ route('user.update', $user->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3 col-6" style="float: left">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" required>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6" style="float: right">
                                <label class="form-label" for="nip">NIP</label>
                                <input type="text" class="form-control  @error('nip') is-invalid @enderror"
                                    name="nip" value="{{ $user->nip }}" required>
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6" style="float: right">
                                <label class="form-label" for="level" flo>Jabatan</label>
                                <select class="form-select" name="level" id=""
                                    class="form-control  @error('level') is-invalid @enderror">
                                    @foreach ($jab as $data)
                                        <option value="{{ $data->id }}" default>{{ $data->jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="level">Level</label>
                                <select name="level" id=""
                                    class="form-select  @error('level') is-invalid @enderror" required>
                                    <option value="User" default>User</option>
                                    <option value="Dosen">Dosen</option>
                                </select>
                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="name">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"
                                    autocomplete="new-password" placeholder="Password" required>
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
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
