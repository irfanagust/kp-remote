<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://irfanagust.github.io/">Irfan Agus Tiawan</a>.</p>

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
                    @foreach ($software as $sp)
                    <tr>
                        <td>{{$sp->nama_perangkat_lunak}}</td>
                        <td>{{$sp->instansi->nama}}</td>
                        <td><a href="/admin/pengembangan-umum/{{$sp->id}}/detail" class="btn btn-primary btn-lg active">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->