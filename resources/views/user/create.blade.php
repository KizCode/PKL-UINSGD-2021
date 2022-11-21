@extends('layouts.app')
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                /* margin: 0; */
            }
        </style>
    </head> --}}
@section('content')
    <div class="container-fluid">
        @include('layouts._flash')
        <div class="row justify-content-center">
            <div class="col-md-8" width="100%">
                <div class="card" width="100%">
                    @include('layouts._flash')
                    <div class="card-header">
                        Data User
                    </div>
                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="row g-2" action="{{ route('user.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-sm-6">
                                <label class="form-label">NIP</label>
                                <input type="number" name="nip"
                                    class="form-control @error('nip', 'users') is-invalid @enderror">
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" width="100%"
                                    name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control  @error('tl') is-invalid @enderror" name="tl"
                                    id="tl" value="{{ old('tl') }}">
                                @error('tl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Golongan</label>
                                <select class="form-select @error('golongan') is-invalid @enderror" name="golongan"
                                    id="golongan">
                                    <option selected disabled>
                                        Pilih Golongan</option>
                                    @foreach ($gol as $data)
                                        <option value="{{ $data->id }}">{{ $data->gol }} -
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('golongan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Jabatan</label>
                                <select class="form-select @error('jabatan') is-invalid @enderror" name="jabatan"
                                    id="jabatan">
                                    <option selected disabled>
                                        Pilih Jabatan</option>
                                    @foreach ($jab as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Level</label>
                                <select name="level" id="level"
                                    class="form-select @error('level') is-invalid @enderror" name="level" id="level">
                                    <option selected disabled>
                                        Pilih User Level</option>
                                    <option value="User" default>User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <div class="mb-3 col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" placeholder="Password">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Must be 8-20 characters long.
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4" id="tombol">Register
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

</html>
