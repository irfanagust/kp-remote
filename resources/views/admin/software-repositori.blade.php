@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Repositori Software Dinas Komunikasi dan Informatika, Banyumas, Jawa Tengah
            </h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            List software yang tersedia dan dapat digunakan
                        </h6>
                        <a href="{{route('show-form-repositori')}}" class="btn btn-secondary btn-icon-split float-lg-right">
                            <span class="icon text-white-50">
                                +
                            </span>
                            <span class="text">Tambah repositori software</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text text-center">
                                        <th>Nama Perangkat Lunak</th>
                                        <th>Pemilik</th>
                                        <th>Jenis Layanan</th>
                                        <th class="text text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($softwares as $software)
                                    <tr>
                                        <td>{{$software->nama_perangkat_lunak}}</td>
                                        <td>
                                            @if ($software->instansi == null)
                                                Dinas Komunikasi dan Informatika Banyumas
                                            @else
                                                {{$software->instansi->nama}}
                                            @endif
                                        </td>
                                        <td>{{$software->jenis_layanan->jenis_layanan}}</td>
                                        <td class="text text-center">
                                            <a href="/admin/repositori/{{$software->id}}/detail" class="btn btn-secondary btn-sm">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                </tbody>
                            </table>
                            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text text-center">
                                        <th>Data Kosong</th>
                                    </tr>
                                </thead>
                                    @endforelse
                                </tbody>
                            </table>  
                                
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- End of Main Content -->
@endsection