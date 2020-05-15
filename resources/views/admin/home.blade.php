@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Selamat Datang Admin</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!--Card Pengajuan Aplikasi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="/admin/listpengajuan/{{2}}">Total aplikasi yang telah disetujui</a></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($software_disetujui)}}</div> 
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href="/admin/listpengajuan/{{1}}">Total aplikasi yang belum disetujui</a></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($software_blm_disetujui)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="/admin/listpengajuan/{{3}}">Total aplikasi yang Dipertimbangkan</a></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($software_dipertimbangkan)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-pause-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href="/admin/listpengajuan/{{4}}">Total aplikasi yang telah tertolak</a></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($software_ditolak)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End of Main Content -->
@endsection