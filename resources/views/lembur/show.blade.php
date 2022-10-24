@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="bg-white pb-50%" >
        <div class="ms-50px pb-50px">
            <table>
                <tr>
                    <th>Nama &nbsp;</th>
                    <td>: &nbsp;</td>
                    <td>{{ $lembur->name }}</td>
                </tr>
                <tr>
                    <th>Hari dan Tanggal &nbsp;</th>
                    <td>: &nbsp;</td>
                    <td>{{ $lembur->htgl }}</td>
                </tr>
                <tr>
                    <th>Waktu &nbsp;</th>
                    <td>: &nbsp;</td>
                    <td>{{ $lembur->waktu }}</td>
                </tr>
    
            </table>
        </div>
    </div>
    
</body>
</html>
@endsection
