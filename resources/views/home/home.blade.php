<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SIK - Pengumuman</title>
    <style>
        body {
            background: url('assets/images/background.png');
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="#"><img src="{{ asset("assets/images/logo.png")}}" width="20%"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container">
        <div class="row  justify-content-center ">
            <div class="col-sm-12 col-md-12 col-lg-8 pt-5">
                <div class="card text-center items-center shadow p-1" style="border-radius: 20px;">
                    <div class="card-header">
                        <div class="d-flex justify-content-center pt-3">
                            <img src="{{ asset("assets/images/logo.png")}}" width="15%">
                        </div>
                        <h4 style="font-weight: bold;">
                            Sistem Informasi Kelulusan
                            <br>Status Kelulusan
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h5 align=" center">
                                <b>DETAIL STATUS KELULUSAN
                                </b>
                            </h5>
                        </div>
                        <hr>
                        <div>
                            <table min-width='100' class='table table-striped table-bordered'>
                                <tr class='success'>
                                    <td colspan='4' align='center'>
                                        <font color='#000000' size='4' style='font-weight: bold;' ;>
                                            <b>IDENTITAS PESERTA DIDIK</b>
                                    </td>
                                </tr>
                                @foreach ($siswa as $item)

                                <tr align="left">
                                    <td>Nama Lengkap</td>
                                    <td colspan='3'>
                                        <font style='text-transform: capitalize;'><strong>
                                            {{$item->nama}}
                                        </strong></font>
                                    </td>
                                </tr>

                                <tr align="left">
                                    <td width='250'>NISN </td>
                                    <td width='480'><strong>
                                        {{$item->nis}}
                                        </strong></td>
                                </tr>

                                <tr align="left">
                                    <td>Kelas</td>
                                    <td colspan='3'>
                                        <strong>
                                            {{$item->kelas}}
                                        </strong>
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td>Asal Sekolah</td>
                                    <td colspan='3'>
                                        <font style='text-transform: capitalize;'>
                                            <strong>
                                                {{$item->setting->nama_lembaga}}
                                            </strong>
                                        </font>
                                    </td>
                                </tr>

                                <tr class='success'>
                                    <td colspan='4' align='center'>
                                        <font color='#000000' size='4' style='font-weight: bold;' ;>
                                            STATUS KELULUSAN DINYATAKAN
                                        </font>
                                    </td>
                                </tr>
                                <tr class='warning'>
                                    <td colspan='4' align='center'>
                                        <font color='#0066FF' size='6' style='text-transform: uppercase;'>
                                            <b>
                                                {{$item->keterangan}}
                                            </b>
                                        </font>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class='success'>
                                    <td colspan='4' align='center'><b>Apapun hasil yang didapat, semoga ini
                                        adalah yang terbaik, tetap semangat dan optimis.</b></td>
                                    </tr>

                                <tr class='secondary'>
                                    <td colspan='4'></td>
                                </tr>
                                <tr>
                                    <td colspan='4' align='center' class="bg-danger text-white">
                                        <b>Catatan:</b> Guna mengambil SKL, mohon menunjukkan surat
                                        keputusan kelulusan.
                                    </td>
                                </tr>
                            </table>
                            <div class='form-group' style='margin-bottom: -10px;'>
                                <p align='center'>
                                    @if ($item->bebas_perpus == 'ya' && $item->akademik == 'ya' && $item->administrasi == 'ya')
                                    <a href='{{ asset('surat/foto1.png')}}' class='btn btn-primary ' target='_blank' rel='noopener noreferrer'>
                                        DONWLOAD SURAT KEPUTUSAN
                                    </a>

                                    @else
                                    <a href='#'  class='btn btn-warning '  rel='noopener noreferrer'>
                                        ANDA BELUM MEMENUHI SYARAT
                                    </a>

                                    @endif
                                </p>
                            </div>

                            <!-- Surat Keputusan -->
                            <div align='center' class='alert alert-dismissable alert-warning'
                                style=" margin-top: 50px;">
                                <h4><b>SYARAT UNDUH SURAT KEPUTUSAN</b></h4>
                            </div>

                            <table min-width='100' class='table table-striped table-bordered'>
                                @foreach ($siswa as $item)

                                @endforeach
                                <tr class='success'>
                                    <td colspan='4' align='center'>
                                        <font color='#000000' size='4' style='font-weight: bold;' ;>
                                            <b>SYARAT TERPENUHI ATAU TIDAK</b>
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td>Bebas Perpus</td>
                                    <td colspan='3'>
                                        @if ($item->bebas_perpus == 'ya')
                                        <font style='text-transform: capitalize;'><strong>Tuntas</strong></font>
                                        @else
                                        <font style='text-transform: capitalize;'><strong>Tidak Tuntas</strong></font>
                                        @endif
                                    </td>
                                </tr>
                                <tr class='secondary' align="left">
                                    <td>Akademik</td>
                                    <td colspan='3'>
                                        @if ($item->akademik == 'ya')
                                        <font style='text-transform: capitalize;'><strong>Tuntas</strong></font>
                                        @else
                                        <font style='text-transform: capitalize;'><strong>Tidak Tuntas</strong></font>
                                        @endif
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td>Administrasi</td>
                                    <td colspan='3'>
                                        @if ($item->administrasi == 'ya')
                                        <font style='text-transform: capitalize;'><strong>Tuntas</strong></font>
                                        @else
                                        <font style='text-transform: capitalize;'><strong>Tidak Tuntas</strong></font>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</body>

</html>
