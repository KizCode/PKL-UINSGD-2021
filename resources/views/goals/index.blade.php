@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                @endif
                @include('sweetalert::alert')
                <div class="card shadow mb-4">
                    <div class="card-header mb-3 m-0 font-weight-bold text-primary">Laporan Lembur
                        {{-- @if (auth()->user()->level == 'User') --}}
                            <a href="{{ route('goals.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add
                                Data
                            </a>
                        {{-- @endif --}}
                    </div>
                    @php $no = 1; @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered " width="100%" cellspacing="0"
                                id="dataTable">
                                <thead>
                                    <th>No</th>
                                    <th>NAMA</th>
                                    <th>Gol</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Action</th>
                                </thead>
                                @foreach ($gol as $data)
                                    <tbody>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->gol }}</td>
                                        <td>{{ $data->user->jabatan->name }}</td>
                                        <td>{{ $data->user->golongan->gol }}</td>
                                        <td>{{ $data->user->urai }}</td>
                                        <td>
                                            <form action="{{ route('goals.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('goals.show', $data->id) }}"
                                                    class="btn btn-primary btn-icon-split">
                                                    <span class="text">Print</span>
                                                </a> |
                                                @if (auth()->user()->level == 'User')
                                                    <a href="{{ route('lembur.edit', $data->id) }}"
                                                        class="btn btn-warning btn-icon-split">
                                                        <span class="text">Edit</span>
                                                    </a> |
                                                @endif
                                                <button type="submit" class="btn btn-danger btn-icon-split"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <span class="text">Delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tbody>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    </script>
@endsection
