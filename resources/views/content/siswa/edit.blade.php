@extends('admin')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">siswas</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">siswa Table</li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data siswa</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Tambah Data siswas</h5>
        </div>
        <hr>

        {{-- form --}}
        <form action="{{ route('siswa.update', $siswa->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class=" mb-3">
                <label class="form-label">NISN:</label>
                <input class="form-control mb-3" type="text" placeholder="NISN"
                    aria-label="default input example" name="nis"
                    value="{{ old('nis', $siswa->nis)}}">
            </div>
            <div class=" mb-3">
                <label class="form-label">Nama:</label>
                <input class="form-control mb-3" type="text" placeholder="Nama"
                    aria-label="default input example" name="nama"
                    value="{{ old('nama', $siswa->nama)}}">
            </div>
            <div class=" mb-3">
                <label class="form-label">Kelas:</label>
                <input class="form-control mb-3" type="text" placeholder="Tahun Pelajaran"
                    aria-label="default input example" name="kelas" value="{{ old('kelas', $siswa->kelas)}}">
            </div>
            <div class=" mb-3">
                <label class="form-label">Password:</label>
                <input class="form-control mb-3" type="text" placeholder="Password"
                    aria-label="default input example" name="password" value="{{ old('password', $siswa->password)}}">
            </div>
            <div class=" mb-3">
                <label class="form-label">Tahun Pelajaran:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="setting_id">
                    @foreach ($setting as $item)
                    <option value="{{ $item->id}}" {{old('setting_id', $siswa->setting_id) == $item->id ? 'selected' : ""}}>{{ $item->tapel}}</option>
                    @endforeach
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-label">Bebas Kartu Perpustakaan:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="bebas_perpus">
                    <option selected value="ya">Tuntas</option>
                    <option value="tidak">Tidak Tuntas</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-label">Ijazah Jenjang Terakhir:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="akademik">
                    <option selected value="ya">Tuntas</option>
                    <option value="tidak">Tidak Tuntas</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-label">Administrasi:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="administrasi">
                    <option selected value="ya">Tuntas</option>
                    <option value="tidak">Tidak Tuntas</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-label">Laporan Tugas Akhir:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="lap_ta">
                    <option selected value="ya">Tuntas</option>
                    <option value="tidak">Tidak Tuntas</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-label">Laporan PKL:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="lap_pkl">
                    <option selected value="ya">Tuntas</option>
                    <option value="tidak">Tidak Tuntas</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-label">Keterangan:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="keterangan">
                    <option selected value="lulus">Lulus</option>
                    <option value="tidak_lulus">Tidak Lulus</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary px-5">Create</button>

            </div>
        </form>
    </div>
</div>
@endsection
