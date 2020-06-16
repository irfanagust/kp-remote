@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengajuan Software oleh Instansi</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!--Card Pengajuan Aplikasi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <a href="/admin/listpengajuan/{{1}}" class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                    {{count($software_blm_disetujui)}}
                                </span>
                                <span class="text">Pengajuan belum disetujui</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <a href="/admin/listpengajuan/{{2}}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    {{count($software_disetujui)}}
                                </span>
                                <span class="text">Pengajuan telah disetujui</span>
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
                            <a href="/admin/listpengajuan/{{3}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    {{count($software_dipertimbangkan)}}
                                </span>
                                <span class="text">Pengajuan masih dipertimbangkan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--Card Pengajuan Aplikasi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <a href="/admin/listpengajuan/{{4}}" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    {{count($software_ditolak)}}
                                </span>
                                <span class="text">Pengajuan telah ditolak</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            List Pengajuan Software 
                            @if ($status_software == 1)
                                belum disetujui
                            @elseif ($status_software == 2)
                                telah disetujui
                            @elseif ($status_software == 3)
                                dipertimbangkan
                            @else
                                ditolak                                
                            @endif
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text text-center">
                                        <th>Nama Perangkat Lunak</th>
                                        <th>Pengaju</th>
                                        <th>Jenis Layanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($softwares as $software)
                                    <tr>
                                        <td>{{$software->nama_perangkat_lunak}}</td>
                                        <td>{{$software->instansi->nama}}</td>
                                        <td>{{$software->jenis_layanan->jenis_layanan}}</td>
                                        <td class="text text-center">
                                            <a href="/admin/listpengajuan/{{$software->id}}/detail" class="btn btn-secondary btn-sm">
                                                Detail
                                            </a>
                                            @if ($status_software == 1)
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSetujuiSoftware{{$software->id}}">
                                                    Setujui
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPertimbangkanSoftware{{$software->id}}">
                                                    Pertimbangkan
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalTolakSoftware{{$software->id}}">
                                                    Tolak
                                                </button>
                                            @elseif($status_software == 2)
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalPengembanganDinkominfo{{$software->id}}">
                                                Pengembangan Dinkominfo
                                            </button>
                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalPengembanganUmum{{$software->id}}">
                                                Pengembangan Umum
                                            </button>
                                            @elseif($status_software == 3)
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSetujuiSoftware{{$software->id}}">
                                                Setujui
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalTolakSoftware{{$software->id}}">
                                                Tolak
                                            </button>
                                            @else
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{$software->id}}">
                                                Hapus
                                            </button>
                                            @endif
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

    @foreach ($softwares as $software)
        <!-- Modal Setuju-->
        <div class="modal fade" id="modalSetujuiSoftware{{$software->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Yakin menyetujui {{$software->nama_perangkat_lunak}} ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM--><form method="POST" action="/admin/listpengajuan/{{$software->id}}/proses-status">
                            @csrf
                            <input type="hidden" name="status_software" value="{{2}}">
                            <input type="hidden" name="alasan_ditolak" value="-">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Yakin</button>
                        </form><!--ENDFORM-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pertimbangkan-->
        <div class="modal fade" id="modalPertimbangkanSoftware{{$software->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Yakin memasukkan {{$software->nama_perangkat_lunak}} ke pertimbangan ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM--><form method="POST" action="/admin/listpengajuan/{{$software->id}}/proses-status">
                            @csrf
                            <input type="hidden" name="status_software" value="{{3}}">
                            <input type="hidden" name="alasan_ditolak" value="-">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Yakin</button>
                        </form><!--ENDFORM-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tolak-->
        <div class="modal fade" id="modalTolakSoftware{{$software->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Yakin menolak {{$software->nama_perangkat_lunak}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM--><form method="POST" action="/admin/listpengajuan/{{$software->id}}/proses-status">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kepada: {{$software->instansi->nama}}</label>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="status_software" value="{{4}}">
                                <label for="alasan_ditolak" class="col-form-label">Alasan ditolak:</label>
                                <textarea class="form-control" required name="alasan_ditolak" id="alasan_ditolak"></textarea>
                            </div>                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Proses</button>
                        </form><!--ENDFORM-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus-->
        <div class="modal fade" id="modalHapus{{$software->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Yakin menghapus {{$software->nama_perangkat_lunak}} ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM--><form method="get" action="/admin/listpengajuan/{{$software->id}}/delete">
                            @csrf                           
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Proses</button>
                        </form><!--ENDFORM-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pengembanga Dinkominfo-->
        <div class="modal fade" id="modalPengembanganDinkominfo{{$software->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Yakin mengirim {{$software->nama_perangkat_lunak}} ke pengembangan DINKOMINFO ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM--><form method="get" action="/admin/listpengajuan/{{$software->id}}/pengembangan/{{2}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Yakin</button>
                        </form><!--ENDFORM-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pengembanga Umum-->
        <div class="modal fade" id="modalPengembanganUmum{{$software->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Yakin mengirim {{$software->nama_perangkat_lunak}} ke pengembangan umum ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM--><form method="get" action="/admin/listpengajuan/{{$software->id}}/pengembangan/{{1}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Yakin</button>
                        </form><!--ENDFORM-->
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection