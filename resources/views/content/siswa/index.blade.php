@extends('admin')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Siswas</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Siswa Table</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ route('siswa.create')}}">Tambah Data</a>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                {{-- <a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                --}}
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Siswa</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Tahun Pelajaran</th>
                        <th>Bebas Perpus</th>
                        <th>Akademik</th>
                        <th>Administrasi</th>
                        <th>Keterangan</th>
                        <th>Dilihat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->setting->tapel }}</td>
                        <td>
                            @if ( $item->bebas_perpus == 'ya' )
                            <span class="badge bg-success">Tuntas</span>
                            @else
                            <span class="badge bg-danger">Tidak Tuntas</span>
                            @endif
                        </td>
                        <td>
                            @if ( $item->akademik == 'ya' )
                            <span class="badge bg-success">Tuntas</span>
                            @else
                            <span class="badge bg-danger">Tidak Tuntas</span>
                            @endif
                        </td>
                        <td>
                            @if ( $item->administrasi == 'ya' )
                            <span class="badge bg-success">Tuntas</span>
                            @else
                            <span class="badge bg-danger">Tidak Tuntas</span>
                            @endif
                        </td>
                        <td>
                            @if ( $item->keterangan == 'lulus' )
                            <span type="button" class="btn btn-success px-3 radius-30">Lulus</span>
                            @else
                            <span class="btn btn-danger px-3 radius-30">Tidak Lulus</span>
                            @endif
                        </td>
                        <td>
                            @if ( $item->viewed == 1 )
                            <span class="btn btn-success radius-30"><i class="bx bx-check"></i></span>
                            @else
                            <span class="btn btn-danger radius-30"><i class="bx bx-x-circle"></i></span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('siswa.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="form-button-action">
                                    {{-- edit --}}
                                    <a href="{{ route('siswa.edit', $item->id)}}" class="btn btn-outline-primary px-5 radius-30" >Edit</a>
                                    {{-- delete --}}
                                    <button type="submit" class="btn btn-outline-danger px-5 radius-30">Hapus</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Tahun Pelajaran</th>
                        <th>Bebas Perpus</th>
                        <th>Akademik</th>
                        <th>Administrasi</th>
                        <th>Keterangan</th>
                        <th>Dilihat</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="formFile">Import Data Siswa</label>
    <input type="file" name="file" id="formFile" class="form-control mb-1">
    <input type="submit" value="Impor data" class=" ">
</form>
@endsection
