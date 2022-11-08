@extends('layouts.app')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-8" width="100%">
                <div class="card" width="100%">
                    <div class="card-header">
                        Data User
                    </div>
                    @include('layouts/_flash')
                    <div class="card-body p-4">
                        <form class="row g-2" action="" method="POST">
                            @csrf
                            <div class="mb-3 col-sm-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" width="100%" name="name" id="name"
                                    @error('tl') is-invalid @enderror name="tl" id="tl" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control  @error('tl') is-invalid @enderror"
                                    name="tl" id="tl">
                                @error('tl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Jabatan</label>
                                <select class="form-select" name="jabatan_id" id="jabtan_id"
                                    @error('email') is-invalid @enderror required>
                                    @foreach ($jab as $data)
                                        <option value="{{ $data->id }}" default>{{ $data->jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Level</label>
                                <select name="level" id="level" class="form-select"
                                    @error('level') is-invalid @enderror name="level" id="level">
                                    <option value="User" default>User</option>
                                    <option value="Dosen">Dosen</option>
                                </select>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" id="email" required>
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
                                        required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" id="simpan">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
