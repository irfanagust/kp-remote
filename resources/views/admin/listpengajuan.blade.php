<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smartcity - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('bootstrap/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('bootstrap/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @php
      $encrypted1 = encrypt(1);
      $encrypted2 = encrypt(2);
      $encrypted3 = encrypt(3);
      $encrypted4 = encrypt(4);    
    @endphp

    {{-- LAYOUTING NAVBAR --}}
    @include('admin.partials.navbar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          {{-- <!-- TOPBAR SEARCH -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> --}}

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user->name}}
                </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            {{-- <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://irfanagust.github.io/">Irfan Agus Tiawan</a>.</p> --}}
  
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3 text-right">
              @if ($status_id==1)
                <i class="btn btn-primary far fa-check-circle"></i> Disetujui
                <i class="btn btn-secondary fas fa-pause-circle"></i> Dipertimbangkan
                <i class="btn btn-danger fas fa-times-circle"></i> Ditolak
              @elseif($status_id==2)
                <i class="btn btn-success fas fa-check-double"></i>Masukkan ke Pengembangan DINKOMINFO
                <i class="btn btn-info fas fa-list-ul"></i> Masukkan ke Pengembangan Umum
                
              @elseif($status_id==3)
                <i class="btn btn-primary far fa-check-circle"></i> Disetujui
                <i class="btn btn-danger fas fa-times-circle"></i> Ditolak
              @else
                <i class="btn btn-danger far fa-ban"></i> Hapus
                {{-- <i class="btn btn-danger far fa-trash"></i> Hapus Permanen --}}
              @endif
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                      <tr>
                            <th>Nama Perangkat Lunak</th>
                            <th>File SOP</th>
                            <th>Instansi Pengaju</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($software))
                          @foreach ($software as $s)
                          <tr>
                              <td>{{$s->nama_perangkat_lunak}}</td>
                              <td>{{$s->fileSOP}}</td>
                              <td>{{$s->instansi->nama}}</td>
                              <td class="text-center">
                                @if ($status_id==1)
                                  <button type="button" class="btn btn-primary far fa-check-circle" data-toggle="modal" data-target="#modalsetuju"></button>
                                  <button type="button" class="btn btn-secondary fas fa-pause-circle" data-toggle="modal" data-target="#modalpertimbangkan"></button>
                                  <button type="button" class="btn btn-danger fas fa-times-circle" data-toggle="modal" data-target="#modaltolak"></button>
                                @elseif($status_id==2)
                                  <button type="button" class="btn btn-success fas fa-check-double" data-toggle="modal" data-target="#modalprogresDINKOMINFO"></button>
                                  <button type="button" class="btn btn-info fas fa-list-ul" data-toggle="modal" data-target="#modalprogrespengembangan"></button>
                                @elseif($status_id==3)
                                  <button type="button" class="btn btn-primary far fa-check-circle" data-toggle="modal" data-target="#modalsetuju"></button>
                                  <button type="button" class="btn btn-danger fas fa-times-circle" data-toggle="modal" data-target="#modaltolak"></button>
                                @else
                                  <a href="/admin/listpengajuan/hapus/{{$s->id}}"><i class="btn btn-danger far fa-trash"></i></a>
                                  {{-- <a href="/admin/listpengajuan/hapuspermanen/{{$s->id}}"><i class="btn btn-danger fas fa-pause-circle"></i></a> --}}
                                @endif
                              </td>
                          </tr>
                          @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->

        {{-- LAYOUTING FOOTER --}}
        @include('admin.partials.footer')
        
      </div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  @if (count($software))
  {{-- SETUJU MODAL --}}              
  <div class="modal fade" id="modalsetuju" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin menyetujuinya</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- FORM MODAL SETUJU --}}
          <form method="get" action="/admin/listpengajuan/proses/{{$s->id}}/2">
            <div class="form-group">
              <input type="hidden" name="alasan_ditolak" value="-">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-success">Proses</button>
          {{-- END FORM MODAL SETUJU --}}
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- PERTIMBANGKAN MODAL --}}              
  <div class="modal fade" id="modalpertimbangkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin masukkan ke pertimbangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- FORM MODAL PERTIMBANGAN --}}
          <form method="get" action="/admin/listpengajuan/proses/{{$s->id}}/3">
            <div class="form-group">
              <input type="hidden" name="alasan_ditolak" value="-">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-success">Proses</button>
          {{-- END FORM MODAL PERTIMBANGAN --}}
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- TOLAK MODAL --}}              
  <div class="modal fade" id="modaltolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alasan mengapa pengajuan ditolak</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="get" action="/admin/listpengajuan/proses/{{$s->id}}/4">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Kepada :</label>
              <label for="recipient-name" class="col-form-label">{{$s->instansi->nama}}</label>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Alasan :</label>
              <textarea class="form-control" name="alasan_ditolak" id="message-text" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-danger">Proses</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  {{-- MASUKKAN KE PENGEMBANGAN DINKOMINFO MODAL --}}              
  <div class="modal fade" id="modalprogresDINKOMINFO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin software ini dimasukkan ke Pengembangan Dinkominfo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- FORM MODAL PROGRES PENGEMBANGAN DINKOMINFO --}}
          <form method="get" action="/admin/listpengajuan/masukkankepengembangan/{{$s->id}}/3">
            <div class="form-group">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-success">Proses</button>
          {{-- END FORM MODAL PROGRES PENGEMBANGAN DINKOMINFO --}}
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- MASUKKAN KE PENGEMBANGAN UMUM MODAL --}}              
  <div class="modal fade" id="modalprogrespengembangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin software ini dimasukkan ke Pengembangan Umum</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- FORM MODAL PROGRES PENGEMBANGAN --}}
          <form method="get" action="/admin/listpengajuan/masukkankepengembangan/{{$s->id}}">
            <div class="form-group">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-success">Proses</button>
          {{-- END FORM MODAL PROGRES PENGEMBANGAN --}}
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('bootstrap/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('bootstrap/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('bootstrap/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('bootstrap/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('bootstrap/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('bootstrap/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
