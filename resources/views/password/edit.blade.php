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
          <form action="{{ route('password.update') }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
              <label class="form-label" for="name">Username</label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Username">
              @error('name')
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
              <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="current_password">Curent Password</label>
              <input id="current_password" type="password" class="form-control @error('password') is-invalid @enderror" name="current_password" required autocomplete="password" placeholder="Password Sebelumnya">
              @error('curent_password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password Baru">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="name">Konfirmasi Password</label>
              <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
              @error('password_confirmation')
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
