@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail repositori software {{$software->nama_perangkat_lunak}}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!--Card Pengajuan Aplikasi -->
            <div class="col-xl-12 col-md-4 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <a href="{{route('repositori')}}" class="btn btn-secondary btn-icon-split">
                                <span class="text">Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{$software->nama_perangkat_lunak}}
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><a stream href="{{Storage::url('file/instansi/document/'.$software->fileSOP)}}">File SOP</a></th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th>Fungsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->fungsi}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->deskripsi}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Pengaju</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @if ($software->instansi==null)
                                                Dinas Komunikasi dan Informatika Banyumas
                                            @else
                                                {{$software->instansi->nama}}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Jenis layanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->jenis_layanan->jenis_layanan}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Jumlah pemakai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->jumlah_pemakai->jumlah_pemakai}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Basis software</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->basis->basis}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Sistem operasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->sistem_operasi->sistem_operasi}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Pengguna layanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->pengguna->pengguna_layanan}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Ruang lingkup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->ruang_lingkup->ruang_lingkup}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Jenis database</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->jenis_database}}</td>
                                    </tr>
                                </tbody>
                                <tr>
                                    <td class="text text-center">
                                        <a href="{{route('repositori')}}" class="btn btn-secondary btn-sm">
                                            Kembali
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End of Main Content -->

@endsection