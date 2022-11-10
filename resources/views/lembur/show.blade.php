<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data PTIPD</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body style="width: auto; font-family: 'Times New Roman', Times, serif">
    <div>
        <table>
            <td>
                <img src="{{ asset('assets/img/logo-uin-199x300.png') }}" alt="logo UIN"
                    style="width: 100px; float: left;">

            </td>
            <td>
                <div style="text-align: right; text-align: center; font-size: 14pt; margin-top:10px;">
                    KEMENTERIAN AGAMA
                    UNIVERSITAS ISLAM NEGERI
                    SUNAN GUNUNG DJATI BANDUNG
                    PUSAT TEKNOLOGI INFORMASI DAN
                    PANGKALAN DATA
                </div>
                <div style="text-align: center; font-size: 11pt;">
                    Jl. A.H. Nasution No. 105 Cibiru Bandung 40614 🕿 (022) 7800525 <br>
                    Fax.(022)7803936 Website: http://ptipd.uinsgd.ac.id
                    E-mail: ptipd@uinsgd.ac.id
                </div>
            </td>
        </table>


        <hr size="5px" style="background-color: black; margin-bottom: 5px;">
    </div>

    </div>
    <div>
        <div style="text-align: center; font-size: 13pt; margin-top:20px; margin-bottom: 10px;">
            <div class="text-center">
                LAPORAN LEMBUR
                PUSAT TEKNOLOGI INFORMASI DAN TEKNOLOGI
            </div>
            <div>
                UIN SUNAN GUNUNG DJATI BANDUNG
            </div>
        </div>


        <div class="ms-50px pb-50px" style="text-align: left">

            <table style="font-size: 12pt">

                <tr>
                    <td>Nama </td>
                    <td>:</td>
                    <td>{{ $lembur->user->name }}</td>
                </tr>
                <tr>
                    <td>Hari dan Tanggal </td>
                    <td>: </td>
                    <td>{{ $hari = Carbon\Carbon::parse($lembur->tgl)->isoFormat('dddd, D MMMM Y') }}</td>
                </tr>
                @php
                    $hari = Carbon\Carbon::parse($lembur->tgl)->isoFormat('dddd');
                    $awal = date_create($lembur->dari);
                    $akhir = date_create($lembur->sampai);
                    $diff = date_diff($awal, $akhir);
                    $lem = $diff->h * 3600 + $diff->i * 60;
                @endphp
                <tr>
                    <td>Waktu Lembur</td>
                    <td>:</td>
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
                </tr>
                <tr>
                    <td>Kegiatan </td>
                    <td>:</td>
                    <td>{{ $lembur->kgtn }}</td>
                </tr>
                <tr>
                    <td>Uraian Lembur </td>
                    <td>: </td>
                </tr>
            </table>
            </h3>
        </div>
        <table
            style="font-size: 12pt; border: 2px solid black; border-radius: 10px; width: 100%; padding-bottom:50%; word-break:break-all; margin-bottom: 10px;">
            <tr>
                <td>{{ $lembur->urai }}</td>
            </tr>
        </table>
    </div>
    <div style="float: left">
        <div style="margin-bottom: 75px">
            Mengetahui <br>
            Kepala PTIPD, <br>
        </div>
        <div>
            Undang Syaripudin, M.Kom <br>
            NIP. 197909302009121002
        </div>
    </div>
    <divs style="float: right">
        <div style="margin-bottom: 75px">
            Bandung, {{ $lembur->created_at->isoFormat('D MMMM Y') }} <br>
            Yang Melaksanakan Lembur, {{ $lembur->name }}
        </div>
        <div>
            {{ $lembur->nip }} <br>
            NIP/NIK
        </div>
    </divs>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
