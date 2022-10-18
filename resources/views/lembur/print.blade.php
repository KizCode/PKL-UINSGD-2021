<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Nama &nbsp;</th>
                <td>:</td>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <th>Hari dan Tanggal &nbsp;</th>
                <td>:</td>
                <td>{{ $htgl = $data->created_at->isoFormat('dddd, D MMMM Y') }}</td>
            </tr>
            <tr>
                <th>Waktu &nbsp;</th>
                <td>:</td>
                <td>{{ $waktu = \Carbon\Carbon::parse($data->created_at)->format('H:i') }}</td>
            </tr>

        </table>
    </div>
</body>
</html>
