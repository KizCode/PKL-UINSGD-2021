@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UIN PTIPD | Lembur</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">

</html>
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-16">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @include('sweetalert::alert')
                <div class="card mb-4">
                    <div class="card-header mb-0 m-0 font-weight-bold text-primary">
                        <span>Laporan Lembur</span>
                        @if (auth()->user()->level == 'User')
                            <a href="{{ route('lembur.create') }}" class="btn btn-sm btn-primary"
                                style="float: right;">Tambah
                                Data
                            </a>
                        @endif
                    </div>
                    @php $no = 1; @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md" id="dataTable">
                                <thead>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Kegiatan</th>
                                    <th>Waktu Lembur</th>
                                    <th>Hari dan Tanggal</th>
                                    <th>Uraian</th>
                                    <th>Action</th>
                                </thead>
                                @foreach ($lembur as $data)
                                    @if ($data->user->nip == Auth::user()->nip || Auth::user()->level == 'Admin')
                                        <tbody>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->user->nip }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->kgtn }}</td>
                                            @php
                                                $hari = Carbon\Carbon::parse($data->tgl)->isoFormat('dddd');
                                                $awal = date_create($data->dari);
                                                $akhir = date_create($data->sampai);
                                                $diff = date_diff($awal, $akhir);
                                                $lem = $diff->h * 3600 + $diff->i * 60;
                                            @endphp
                                            <td>
                                                @if ($lem <= 0)
                                                    Tidak Lembur
                                                @elseif ($lem >= 32400)
                                                    @php
                                                        $jam = ($lem - 28800) / 3600;
                                                        echo round($jam) . ' Jam';
                                                    @endphp
                                                @elseif ($lem >= 28800)
                                                    @if (($lem - 28800) / 60 < 45)
                                                        Tidak Lembur
                                                    @else
                                                        {{ ($lem - 28800) / 60 }} Menit
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ Carbon\Carbon::parse($data->tgl)->isoFormat('dddd, D MMM Y') }}</td>
                                            <td>{{ $uraian = substr($data->urai, 0, 15) }}</td>
                                            <td>
                                                <form action="{{ route('lembur.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    @if ($lem >= 28800)
                                                        <a href="{{ route('lembur.show', $data->id) }}"
                                                            class="btn btn-outline-primary">
                                                            <span class="text bi bi-printer-fill">Print</span>
                                                        </a> |
                                                    @endif
                                                    @if (auth()->user()->level == 'User')
                                                        <a href="{{ route('lembur.edit', $data->id) }}"
                                                            class="btn btn-warning-warning ">
                                                            <span class="text">Edit</span>
                                                        </a> |
                                                    @endif
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Apakah Kamu Yakin?')">
                                                        <span class="text">Delete</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tbody>
                                    @endif
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
