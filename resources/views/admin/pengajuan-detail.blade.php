@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail pengajuan {{$software->nama_perangkat_lunak}}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!--Card Pengajuan Aplikasi -->
            <div class="col-xl-2 col-md-4 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <a href="/admin/listpengajuan/{{$software->status_id}}" class="btn btn-secondary btn-icon-split">
                                <span class="text">Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Software ini
                            @if ($software->status_id == 1)
                                belum disetujui
                            @elseif ($software->status_id == 1)
                                telah disetujui
                            @elseif ($software->status_id == 3)
                                masih dalam pertimbangan
                            @else
                                telah ditolak                                
                            @endif
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Perangkat Lunak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$software->nama_perangkat_lunak}}</td>
                                    </tr>
                                </tbody>
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
                                        <td>{{$software->instansi->nama}}</td>
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
                                        @if ($software->status_id == 1)
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSetujuiSoftware{{$software->id}}">
                                            Setujui
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPertimbangkanSoftware{{$software->id}}">
                                            Pertimbangkan
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalTolakSoftware{{$software->id}}">
                                            Tolak
                                        </button>
                                        @elseif ($software->status_id == 2)
                                        <button type="button" class="btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalPengembanganDinkominfo{{$software->id}}">
                                            Pengembangan Dinkominfo
                                        </button>
                                        <button type="button" class="btn-outline-success btn-sm" data-toggle="modal" data-target="#modalPengembanganUmum{{$software->id}}">
                                            Pertimbangkan
                                        </button>
                                        @elseif (3)
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End of Main Content -->

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
@endsection