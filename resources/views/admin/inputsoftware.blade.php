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

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user->name}}</span>
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
            <!-- Content Row -->
            <div class="row">
              <div class="col-md-offset-3 col-md-12">
                <div class="card shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h3 font-weight-bold text-primary text-uppercase mb-1 text-center">Form Input master software</div>
                        <br>
                        {{-- FORM --}}
                        <form class="user" action="/admin/input-software/proses" method="POST">
  
                          {{ csrf_field() }}
  
                          <input type="hidden" name="status" value="2">
                          <input type="hidden" name="progres_id" value="2">
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="nama_perangkat_lunak">Nama Perangkat Lunak</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <input type="text" class="form-control" name="nama_perangkat_lunak" id="nama_perangkat_lunak" placeholder="Nama perangkat lunak">
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('nama_perangkat_lunak'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('nama_perangkat_lunak')}}
                            </div>
                            @endif
                          </div>
                          
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="fileSOP">File SOP</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <input type="file" class="form-control" name="fileSOP" id="fileSOP" placeholder="Mohon sertakan file SOP">
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('fileSOP'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('fileSOP')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="fungsi">Fungsi</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <input type="text" class="form-control" name="fungsi" id="fungsi" placeholder="Fungsi utama perangkat lunak">
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('fungsi'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('fungsi')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="deskripsi">Deskripsi</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsikan perangkat lunak yang dimaksud sejelas mungkin"></textarea>
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('deskripsi'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('deskripsi')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="jenis_layanan_id">Jenis layanan</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select name="jenis_layanan_id" class="form-control" id="jenis_layanan_id">
                                <option selected disabled>---Jenis Layanan---</option>
                              @foreach ($jenis_layanan as $jl)
                                <option value="{{$jl->id}}">{{$jl->jenis_layanan}}</option>
                              @endforeach
                              </select>
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('jenis_layanan_id'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('jenis_layanan_id')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="jumlah_pemakai_id">Jumlah Pemakai</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select name="jumlah_pemakai_id" class="form-control" id="jumlah_pemakai_id">
                                <option selected disabled>---Jumlah Pemakai---</option>
                              @foreach ($jumlah_pemakai as $jp)
                                <option value="{{$jp->id}}">{{$jp->jumlah_pemakai}}</option>
                              @endforeach
                              </select>
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('jumlah_pemakai_id'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('jumlah_pemakai_id')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="basis_id">Basis atau Platform</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select name="basis_id" class="form-control" id="basis_id">
                                <option selected disabled>---Basis atau Platform---</option>
                              @foreach ($basis as $b)
                                <option value="{{$b->id}}">{{$b->basis}}</option>
                              @endforeach
                              </select>
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('basis_id'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('basis_id')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="sistem_operasi_id">Sistem Operasi</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select name="sistem_operasi_id" class="form-control" id="sistem_operasi_id">
                                <option selected disabled>---Sistem Operasi---</option>
                              @foreach ($sistem_operasi as $so)
                                <option value="{{$so->id}}">{{$so->sistem_operasi}}</option>
                              @endforeach
                              </select>
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('sistem_operasi_id'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('sistem_operasi_id')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="pengguna_id">Pengguna Layanan</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select name="pengguna_id" class="form-control" id="pengguna_id">
                                <option selected disabled>---Pengguna Layanan---</option>
                              @foreach ($pengguna as $p)
                                <option value="{{$p->id}}">{{$p->pengguna_layanan}}</option>
                              @endforeach
                              </select>
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('pengguna_id'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('pengguna_id')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="ruang_lingkup_id">Ruang Lingkup</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select name="ruang_lingkup_id" class="form-control" id="ruang_lingkup_id">
                                <option selected disabled>---Ruang Lingkup---</option>
                              @foreach ($ruang_lingkup as $rl)
                                <option value="{{$rl->id}}">{{$rl->ruang_lingkup}}</option>
                              @endforeach
                              </select>
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('ruang_lingkup_id'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('ruang_lingkup_id')}}
                            </div>
                            @endif
                          </div>
  
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label for="jenis_database">Jenis Database</label>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <input type="text" class="form-control" name="jenis_database" id="jenis_database" placeholder="Jenis Database">
                            </div>
                            {{-- Menampilkan ERROR kalo FORM ga disi --}}
                            @if($errors->has('jenis_database'))
                            <div class="text-danger col-sm-12 mb-3 mb-sm-0">
                                {{ $errors->first('jenis_database')}}
                            </div>
                            @endif
                          </div>
                          
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <button type="submit" class="btn btn-primary btn-user">Masukkan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; <a href="https://irfanagust.github.io/">Irfan Agus Tiawan</a> 2019</span>
            </div>
            </div>
        </footer>
        <!-- End of Footer -->

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
