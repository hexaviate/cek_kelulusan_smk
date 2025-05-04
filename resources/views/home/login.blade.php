<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SIK - Login</title>
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
        <div class="row  justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-5 pt-5">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="card text-center items-center">
                    <div class="card-header">
                        <div class="d-flex justify-content-center pt-3">
                            <img src="{{ asset("assets/images/logo.png")}}" width="20%">
                        </div>
                        <h4 style="font-weight: bold;">
                            Sistem Informasi Kelulusan
                            <br>SMK Salafiyah
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-dismissable alert-success">
                            <h5 align=" center">
                                <b>PENGUMUMAN STATUS KELULUSAN</br>TAHUN 2025 DIBUKA
                                </b>
                            </h5>
                        </div>
                        <hr>

                        {{-- form --}}
                        <form action="{{ route('pengumuman')}}" method="POST">
                            @csrf
                            <input type="text" placeholder="Masukkan Nomor NISN" class="form-control" name="nis">
                            <button type="submit" class="btn btn-success mt-3">Periksa Data</button>
                        </form>
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
