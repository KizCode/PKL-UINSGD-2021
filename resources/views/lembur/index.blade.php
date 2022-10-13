@extends('layouts.admin')

@section('content')
    <div class="col-xl-container col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Lembur</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">

                            {{ $lemburs }}
                            <span>LAPORAN</span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="auto" fill="currentColor"
                            class="bi bi-clipboard2-data-fill" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                            <path
                                d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Laporan Lembur
                        <a href="{{ route('lembur.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Data
                        </a>
                    </div>
                    @php $no = 1; @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <td>No </td>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Hari dan Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Kegiatan</th>
                                    <th>Uraian</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                        @foreach ($lembur as $data)
                                        <td> {{ $no++ }}</td>
                                        <td>{{ Auth::user()-> nip}}</td>
                                        <td> {{ Auth::user()->name }}</td>
                                        <td>{{ $htgl = $data->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('H:i') }}</td>
                                        <td>{{ $data->kgtn }}</td>
                                        <td>{{ $data->urai }}</td>
                                        <td>
                                            <form action="{{ route('lembur.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="#" class="btn btn-sm btn-outline-info">
                                                    Print
                                                </a> |
                                                <a href="{{ route('lembur.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning">Edit
                                                </a> |
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are You Sure?')">Delete</button>
                                            </form>
                                        </td>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
