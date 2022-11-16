@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts._flash')
                <div class="card mt-3">
                    <div class="card-header mb-3">Buat Jabatan Baru</div>
                    <div class="card-body p-4">
                        <form class="row g-2" action="{{ route('goals.store') }}" method="post">
                            @csrf
                            <div class="mb-3 col-12" style="float">
                                <label for="">Pilih Data Pekerjaan</label>
                                <select class="form-select" name="lembur" id="" required>
                                    @foreach ($peker as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('urai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
