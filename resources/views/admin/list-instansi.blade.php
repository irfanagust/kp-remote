@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                List akun Instansi-instansi, Banyumas, Jawa Tengah
            </h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="{{route('show-form-instansi')}}" class="btn btn-secondary btn-icon-split float-lg-right">
                            <span class="icon text-white-50">
                                +
                            </span>
                            <span class="text">Tambah akun Instansi</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text text-center">
                                        <th>Nama Instansi</th>
                                        <th>Username</th>
                                        <th>Kontak</th>
                                        <th class="text text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($instansis as $instansi)
                                    <tr>
                                        <td>{{$instansi->nama}}</td>
                                        <td>
                                            {{$instansi->user->email}}
                                        </td>
                                        <td>{{$instansi->no_hp}}</td>
                                        <td class="text text-center">
                                            <a href="/admin/instansi/{{$instansi->id}}/ubah" class="btn btn-secondary btn-sm">
                                                Ubah
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