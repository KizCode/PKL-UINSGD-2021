<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data PTIPD</title>
</head>

<body>
    <div>
        <table>
            <div style="text-align: left;">
                <p>
                    <img src="{{ asset('assets/img/logo-uin-199x300.png') }}" alt="logo UIN" style="width: 200px; float: left;">
                    <div
                    style="text-align: right; text-align: center; font-size: 40px; margin-top:10px; margin-bottom: 10px;">
                    <b>
                        <div>
                            KEMENTERIAN AGAMA
                        </div>
                        <div>
                            UNIVERSITAS ISLAM NEGERI
                        </div>
                        <div>
                            SUNAN GUNUNG DJATI BANDUNG
                        </div>
                    </b>
                </div>
                <div style="font-size: 40px; text-align: center;">
                    <div>
                        PUSAT TEKNOLOGI INFORMASI DAN
                    </div>
                    <div>
                        PANGKALAN DATA
                    </div>
                </div>
                <div style="text-align: center; font-size: 20px;">
                    <div>
                        Jl. A.H. Nasution No. 105 Cibiru Bandung 40614 🕿 (022) 7800525
                    </div>
                    <div>
                        Fax.(022)7803936 Website: http://ptipd.uinsgd.ac.id E-mail: ptipd@uinsgd.ac.id
                    </div>
                </div>

                </p>
            </div>
        </table>
    </div>
    <hr size="5px" style="background-color: black; margin-bottom: 5px;">
    <div>
        <div style="text-align: center; font-size: 36px; margin-top:20px; margin-bottom: 10px;">
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


        <div class="ms-50px pb-50px" style="text-align: left">

            <table style="font-size: 36px">

                <tr>
                    <td>Nama &nbsp;</td>
                    <td>: &nbsp;</td>
                    <td>{{ $lembur->name }}</td>
                </tr>
                <tr>
                    <td>Hari dan Tanggal &nbsp;</td>
                    <td>: &nbsp;</td>
                    <td>{{ $lembur->htgl = $lembur->created_at->isoFormat('dddd, D MMMM Y') }}</< /td>
                </tr>
                @php
                    $awal = date_create($lembur->dari);
                    $akhir = date_create($lembur->sampai);
                    $diff = date_diff($awal, $akhir);
                @endphp
                <tr>
                    <td>Waktu &nbsp;</td>
                    <td>: &nbsp;</td>
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
                    <td>Kegiatan &nbsp;</td>
                    <td>:</td>
                    <td>{{ $lembur->kgtn }}</td>
                </tr>
                <tr>
                    <td>Uraian Lembur &nbsp;</td>
                    <td>: &nbsp;</td>
                </tr>
            </table>
            </h3>
        </div>
        <div style="font-size: 25px; width: 100%; border: 2px solid black; padding-bottom: 200px;">
            <a>{{ $lembur->urai }}</a>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
