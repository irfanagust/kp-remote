@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Calon Pengembang</h1>
        <p class="mb-4">Berikut adalah calon pengembang dari software {{$software->nama_perangkat_lunak}}.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Nama Perangkat Lunak</th>
                                <th>Intansi Pengaju Software</th>
                                <th>Pendaftar menjadi pengembang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$software->nama_perangkat_lunak}}</td>
                                <td>{{$software->instansi->nama}}</td>
                                <td class="text text-right">
                                    @forelse ($software->pengembangs as $sp)
                                        @if ($sp->pivot->status==0)
                                            <label>{{$sp->nama}}</label>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$sp->id}}">
                                                Pilih
                                            </button>
                                        @else
                                            <label>{{$sp->nama}}</label>
                                            <button type="button" class="btn btn-secondary">
                                                Telah Dipilih
                                            </button>
                                        @endif
                                        <br>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$sp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Yakin memilih {{$sp->nama}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Deskripsi tentang {{$sp->nama}} :</p>
                                                        <p>{{$sp->deskripsi}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <a href="/admin/pengembangan/umum/{{$software->id}}/{{$sp->id}}" type="button" class="btn btn-primary">Yakin</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MODAL -->

                                    @empty
                                        Belum ada pendaftar
                                    @endforelse
                                </td>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection