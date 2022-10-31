<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data PTIPD</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body style="width: auto; font-family: 'Times New Roman', Times, serif;  ">
    <div>
        <table>
            <div style="text-align: left;">
                <img src="{{ asset('assets/img/logo-uin-199x300.png') }}" alt="logo UIN"
                    style="width: 100px; float: left; margin-right: 20px">
                <div style="text-align: right; text-align: center; font-size: 14pt; margin-top:10px;">
                    KEMENTERIAN AGAMA <br>

                    UNIVERSITAS ISLAM NEGERI <br>

                    SUNAN GUNUNG DJATI BANDUNG

                </div>
                <div style="font-size: 14pt; text-align: center; margin-bottom:10px; ">

                    PUSAT TEKNOLOGI INFORMASI DAN <br>
                    PANGKALAN DATA

                </div>
                <div style="text-align: center; font-size: 11pt;">
                    Jl. A.H. Nasution No. 105 Cibiru Bandung 40614 🕿 (022) 7800525 <br>
                    Fax.(022)7803936 Website: http://ptipd.uinsgd.ac.id
                    E-mail: ptipd@uinsgd.ac.id
                </div>

            </div>
        </table>
    </div>
    <div>
        <hr size="5px" style="background-color: black; margin-bottom: 5px;">
    </div>
    <div>
        <div style="text-align: center; font-size: 13pt; margin-top:20px; margin-bottom: 10px;">
            <div>
                LAPORAN LEMBUR
            </div>
            <div>
                PUSAT TEKNOLOGI INFORMASI DAN TEKNOLOGI
            </div>
            <div>
                UIN SUNAN GUNUNG DJATI BANDUNG
            </div>
        </div>


        <div class="ms-50px pb-50px" style="text-align: left; margin-top: 40px;">

            <table style="font-size: 12pt">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $lembur->name }}</td>
                </tr>
                <tr>
                    <td>Hari dan Tanggal </td>
                    <td>: </td>
                    <td>{{ $lembur->htgl = $lembur->created_at->isoFormat('dddd, D MMMM Y') }}</< /td>
                </tr>
                @php
                    $awal = date_create($lembur->dari);
                    $akhir = date_create($lembur->sampai);
                    $diff = date_diff($awal, $akhir);
                @endphp
                <tr>
                    <td>Waktu </td>
                    <td>:</td>
                    <td>
                        @if ($diff->h > 00)
                            {{ $diff->h }} Jam
                        @endif
                        @if ($diff->i > 00)
                            {{ $diff->i }} Menit
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Kegiatan </td>
                    <td>:</td>
                    <td>{{ $lembur->kgtn }}</td>
                </tr>
                <tr>
                    <td>Hasil Uraian </td>
                    <td>: </td>
                </tr>
            </table>
        </div>
        <table
            style="font-size: 12pt; border: 2px solid black; border-radius: 10px; width: 100%; padding-bottom:50%; word-break:break-all; margin-bottom: 10px; margin-top: 20px;">
            <tr>
                <td>{{ $lembur->urai }}</td>
            </tr>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
<footer>
    <div style="float: left; margin-top: 60px;">
        <div style="margin-bottom: 75px">
            Mengetahui <br>
            Kepala PTIPD, <br>
        </div>
        <div>
            Undang Syaripudin, M.Kom <br>
            NIP. 197909302009121002
        </div>
    </div>
    <div style="float: right; margin-top: 60px;">
        <div style="margin-bottom: 75px">
            Bandung, {{ $lembur->created_at->isoFormat('D MMMM Y') }} <br>
            Yang Melaksanakan Lembur, {{ $lembur->name }}
        </div>
        <div>
            {{ $lembur->nip }} <br>
            NIP/NIK
        </div>
    </div>
</footer>

</html>
