@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts._flash')
                <div class="bg-white rounded-3 mt-5">
                    <div class="card-header mb-2">Buat Laporan</div>
                    <div class="card-body p-4">
                        <form class="row g-2" action="{{ route('lembur.store') }}" method="post">
                            @csrf
                            @php
                                $hari = Carbon\Carbon::now()->isoFormat('dddd');
                            @endphp
                            <div class="mb-3 col-6">
                                <label for="">Jam Datang</label>
                                <input type="time" name="dari"
                                    @if ($hari == 'Jumat') value="07:30"
                                    @else
                                        value="08:00" @endif
                                    class="form-control @error('kgtn') is-invalid @enderror"></input>
                                @error('kgtn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">Jam Pulang</label>
                                <input type="time" name="sampai"
                                    @if ($hari == 'Jumat') value="16:30"
                                    @else
                                        value="16:00" @endif
                                    class="form-control @error('kgtn') is-invalid @enderror"></input>
                                @error('kgtn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-4 container">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit"    onclick="showAlert()">
                                        Save
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
