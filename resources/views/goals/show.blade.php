<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Golongan</th>
        <th>Jabatan</th>
        <th>Jenis Pekerjaan</th>
        <th>Action</th>
    </thead>
    @foreach ($gol as $data)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->user->golongan->gol }} - {{ $data->user->golongan->name }}</td>
            <td>{{ $data->user->jabatan->jabatan }}</td>
            <td>
                @if ($data->jepe == true)
                    {{ $data->jepe }}
                @else
                    {{ $data->lembur->urai }}
                @endif
            </td>
        </tbody>
    @endforeach
    </tbody>
</table>
