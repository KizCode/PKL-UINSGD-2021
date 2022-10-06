@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts._flash')
            <div class="card border-secondary">
                <div class="card-header mb-3">Data Pegawai
                    <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Data
                    </a>
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead>
                            <th>No</th>
                            <th>Lapor Lembur</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Tanggal</th>
                            <th>Jenis Lembur</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($guru as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->laporlembur }}</td>
                                <td>{{ $data->jammasuk }}</td>
                                <td>{{ $data->jamkeluar }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->jenislembur }}</td>
                               
                                <td>
                                        <form action="{{ route('guru.destroy', $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('guru.edit', $data->id) }}" class="btn btn-sm btn-outline-warning">Edit
                                            </a> |
                                            <a href="{{ route('guru.show', $data->id) }}" class="btn btn-sm btn-outline-info">Show
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
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