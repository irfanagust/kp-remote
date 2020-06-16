@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            {{-- NAVBAR --}}
            <!--Card Pengajuan Aplikasi belum ada pengembang -->
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center float-left">
                            <a href="/admin/pengembangan/umum/status-dikembangkan/{{0}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    {{-- {{count($software_blm_disetujui)}} --}}
                                </span>
                                <span class="text">Pengajuan belum ada pengembang</span>
                            </a>
                        </div>

                        <div class="row no-gutters align-items-center float-right">
                            <a href="/admin/pengembangan/umum/status-dikembangkan/{{1}}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    {{-- {{count($software_blm_disetujui)}} --}}
                                </span>
                                <span class="text">Pengajuan sudah ada pengembang</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END NAVBAR --}}
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <h3>
                    @if ($h1==0)
                        Software yang belum ada pengembang yang mendaftar
                    @else
                        Software yang sudah ada pengembang yang mendaftar
                    @endif
                </h3>
            </div>
        </div>

        <div class="row">    
            @forelse ($softwares as $software)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$software->nama_perangkat_lunak}}</div>
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">pengaju : {{$software->instansi->nama}}</div>
                                <div class="h5 mb-0 font-weight-bold text-white-800">
                                    <a href="/admin/pengembangan/umum/{{$software->id}}/detail" class="btn btn-primary btn-sm active">Detail</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white-800">
                                @if ($software->progres_id == 2)
                                    <a href="/admin/pengembangan/umum/{{$software->id}}/update" class="btn btn-info btn-sm active mt-1"
                                        onclick="confirm('Yakin mengkonfirmasi pengembangan software ini ?')">
                                        Konfirmasi selesai
                                    </a>
                                @elseif ($software->progres_id == 1)
                                    Software telah selesai
                                @else                                    
                                    Software belum selesai
                                @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Kosong</div>
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Data Kosong</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection