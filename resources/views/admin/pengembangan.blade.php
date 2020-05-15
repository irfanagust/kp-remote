@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengembangan</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!--Card Pengajuan Aplikasi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <a href="#" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    {{15}}
                                </span>
                                <span class="text">Pengembangan Umum</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    {{10}}
                                </span>
                                <span class="text">Pengembangan DINKOMINFO</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            
        </div>
    </div>
    <!-- End of Main Content -->
@endsection