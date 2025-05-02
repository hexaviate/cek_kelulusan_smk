@extends('admin')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Settings</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Setting Table</li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Setting</li>
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
            <h5 class="mb-0 text-primary">Tambah Data Settings</h5>
        </div>
        <hr>

        {{-- form --}}
        <form action="">
            <div class=" mb-3">
                <label class="form-label">Nama Lembaga:</label>
                <input class="form-control mb-3" type="text" placeholder="Nama Lembaga"
                    aria-label="default input example">
            </div>
            <div class=" mb-3">
                <label class="form-label">Logo Lembaga:</label>
                <input id="fancy-file-upload" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png"
                    multiple>
            </div>
            <div class=" mb-3">
                <label class="form-label">Tahun Pelajaran:</label>
                <input class="form-control mb-3" type="text" placeholder="Tahun Pelajaran"
                    aria-label="default input example">
            </div>
            <div class=" mb-3">
                <label class="form-label">Status:</label>
                <select class="form-control mb-3" aria-label="Default select example">
                    <option selected>Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary px-5">Create</button>

            </div>
        </form>
    </div>
</div>
@endsection
