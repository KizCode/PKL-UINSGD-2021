@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Data Pegawai
                        <a href="{{ route('lembur.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" >
                            <table id="dataTable" >
                                <thead>
                                    <tr>
                                        @php $no = 1; @endphp
                                        @foreach ($lembur as $data)
                                        <td>No </td>
                                        <td></td>
                                        <td>:</td>
                                        <td></td>
                                        <td> {{ $no++ }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama </td>
                                        <td>:</td>
                                        <td> {{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hari dan Tanggal</td>
                                        <td>:</td>
                                        <td>{{ $data->htgl }}</td>
                                    </tr>
                                    <tr>

                                        <th>Waktu</th>
                                    </tr>
                                    <th>Kegiatan</th>
                                </thead>
                                <tbody>
                                        <tr>
                                            
                                            <td>{{ $data->waktu }}</td>
                                            <td>{{ $data->kgtn }}</td>
                                        </tr>
                            </table>
                            <table >
                                <thead>
                                    <th>Uraian</th>
                                </thead>
                                <tbody>
                                    <td>{{ $data->urai }}</td>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <td>
                                                <form action="{{ route('lembur.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('lembur.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">Edit
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are You Sure?')">Delete</button>
                                                </form>
                                            </td>
                                </tbody>
                            </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
