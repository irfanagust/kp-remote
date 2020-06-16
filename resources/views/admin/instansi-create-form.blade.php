@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!--Card Pengajuan Aplikasi -->
        <div class="col-xl-12 col-md-4 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <a href="{{route('show-instansi')}}" class="btn btn-secondary btn-icon-split">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buat akun instansi</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Isikan form dibawah dengan jawaban yang benar dan sesuai fakta
                        </h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('create-instansi')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-9 offset-1">
                                    <label for="nama">Nama instansi</label>
                                    <input value="{{old('nama')}}" type="text" class="form-control" name="nama" id="nama" placeholder="Nama Instansi daerah"/>
                            
                                    <div class="validate text-danger">
                                        @if($errors->has('nama'))
                                            {{ $errors->first('nama')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat instansi tersebut"/>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('alamat'))
                                            {{ $errors->first('alamat')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="no_hp">Kontak</label>
                                    <input type="tel" class="form-control" name="no_hp" id="no_hp" placeholder="Kontak instansi tersebut"/>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('no_hp'))
                                            {{ $errors->first('no_hp')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="email">Email</label>
                                    <input type="text" value="{{old('email')}}" class="form-control" name="email" id="email" placeholder="Email valid dari instansi"/>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('email'))
                                            {{ $errors->first('email')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="password">Kata sandi</label>
                                    <input type="password" value="{{old('password')}}" class="form-control" name="password" id="password" placeholder="Masukkan kata sandi" />
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('password'))
                                            {{ $errors->first('password')}}
                                         @endif
                                    </div>
                                </div>
        
                                <div class="form-group col-md-9 offset-1">
                                    <label for="confirmpassword">Konfirmasi kata sandi</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="confirmpassword" placeholder="Masukkan konfirmasi kata sandi" />
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 offset-5">
                                    <button type="submit" class="btn btn-primary">Buat</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End of Main Content -->

@endsection