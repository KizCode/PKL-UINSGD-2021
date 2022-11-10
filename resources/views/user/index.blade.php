@extends('layouts.admin')
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PTIPD SGD | Daftar User</title>
    {{-- <link rel="stylesheet" href="{{ asset('stisla/dist/assets/css/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('stisla/dist/assets/css/components.css') }}"> --}}
</head>

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row sortable-card ui-sortable">
        <div class="col col-md-4 mb-4 ">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                TERDAFTAR</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $juser }}
                                <span>USER</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <svg xmlns="" width="50" fill="currentColor" class="bi bi-people-fill"
                                viewBox="0 0 20 20">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-md-4 mb-4 ">
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
                            <svg xmlns="" width="50" fill="currentColor" class="bi bi-clipboard2-data-fill"
                                viewBox="0 0 20 20">
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

        <div class="col-xl-container col-md-4 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body float-end">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Perintah Kerja</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                {{-- {{ $lembur }} --}}0
                                <span>SPK Lembur</span>
                            </div>
                        </div>
                        <div class="col-auto float-end">
                            <svg xmlns="" width="50" fill="currentColor" class="bi bi-clipboard2-data-fill"
                                viewBox="0 0 20 20">
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
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-16">
                @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @include('sweetalert::alert')

                @php $no = 1; @endphp
                <div class="card mb-4">
                    <div class="card-header mb-0 m-0 font-weight-bold text-primary">
                        <span>User Terdaftar</span>
                        @if (auth()->user()->level == 'Admin')
                            <a class="btn btn-sm btn-primary ms-5 float-end" href="{{ route('user.create') }}">Tambah
                                Data</a>
                        @endif
                    </div>
                    @php $no = 1; @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-boardered table-md" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Golongan</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($user as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nip }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->jabatan->jabatan }}</td>
                                            <td>{{ $data->golongan->gol }} - {{ $data->golongan->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->level }}</td>
                                            <td>
                                                <form action="{{ route('user.destroy', $data->id) }}" method="post">
                                                    @csrf @method('delete')
                                                    <a href="{{ route('user.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
