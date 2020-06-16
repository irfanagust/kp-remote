@extends('admin.partials.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!--Card Pengajuan Aplikasi -->
        <div class="col-xl-12 col-md-4 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <a href="{{route('repositori')}}" class="btn btn-secondary btn-icon-split">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input repositori software</h1>
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
                        <form method="POST" action="{{route('create-repositori')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-9 offset-1">
                                    <label for="nama_perangkat_lunak">Nama perangkat lunak</label>
                                    <input value="{{old('nama_perangkat_lunak')}}" type="text" class="form-control" name="nama_perangkat_lunak" id="nama_perangkat_lunak" placeholder="Nama Aplikasi"/>
                            
                                    <div class="validate text-danger">
                                        @if($errors->has('nama_perangkat_lunak'))
                                            {{ $errors->first('nama_perangkat_lunak')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="fileSOP">File SOP</label>
                                    <input type="file" class="form-control" name="fileSOP" id="fileSOP" placeholder="Sertakan file dokumentasi aplikasi"/>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('fileSOP'))
                                            {{ $errors->first('fileSOP')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="deskripsp">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Jelaskan secara detail apa saja goals dari software ini">{{old('deskripsi')}}</textarea>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('deskripsi'))
                                            {{ $errors->first('deskripsi')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="fungsi">Fungsi</label>
                                    <input type="text" value="{{old('fungsi')}}" class="form-control" name="fungsi" id="fungsi" placeholder="Fungsi utama dari software" />
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('fungsi'))
                                            {{ $errors->first('fungsi')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-5 offset-1">
                                    <label for="jenis_layanan_id">Jenis Layanan</label>
                                    <select name="jenis_layanan_id" class="form-control" id="jenis_layanan_id">
                                        <option selected disabled>--Pilih jenis layanan--</option>
                                        @foreach ($jenis_layanan as $jl)
                                        <option value="{{$jl->id}}">{{$jl->jenis_layanan}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('jenis_layanan_id'))
                                            {{ $errors->first('jenis_layanan_id')}}
                                        @endif
                                    </div>    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jumlah_pemakai_id">Kisaran jumlah pemakai</label>
                                    <select name="jumlah_pemakai_id" class="form-control" id="jumlah_pemakai_id">
                                        <option selected disabled>--Pilih kisaran jumlah--</option>
                                    @foreach ($jumlah_pemakai as $jp)
                                        <option value="{{$jp->id}}">{{$jp->jumlah_pemakai}}</option>
                                    @endforeach
                                    </select>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('jumlah_pemakai_id'))
                                            {{ $errors->first('jumlah_pemakai_id')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-5 offset-1">
                                    <label for="basis_id">Basis aplikasi_id</label>
                                    <select name="basis_id" id="basis_id" class="form-control">
                                        <option selected disabled>--Pilih basis aplikasi--</option>
                                    @foreach ($basis as $b)
                                        <option value="{{$b->id}}">{{$b->basis}}</option>
                                    @endforeach
                                    </select>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('basis_id'))
                                            {{ $errors->first('basis_id')}}
                                        @endif
                                    </div> 
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sistem_operasi_id">Sistem operasi yang digunakan</label>
                                    <select name="sistem_operasi_id" class="form-control" id="sistem_operasi_id">
                                        <option selected disabled>--Pilih sistem operasi--</option>
                                    @foreach ($sistem_operasi as $so)
                                        <option value="{{$so->id}}">{{$so->sistem_operasi}}</option>
                                    @endforeach
                                    </select>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('sistem_operasi_id'))
                                            {{ $errors->first('sistem_operasi_id')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-5 offset-1">
                                    <label for="pengguna_id">Target pengguna aplikasi</label>
                                    <select name="pengguna_id" class="form-control" id="pengguna_id">
                                        <option selected disabled>--Pilih kategori pengguna--</option>
                                    @foreach ($pengguna as $peng)
                                        <option value="{{$peng->id}}">{{$peng->pengguna_layanan}}</option>
                                    @endforeach
                                    </select>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('pengguna_id'))
                                            {{ $errors->first('pengguna_id')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ruang_lingkup_id">Ruanglingkup Aplikasi</label>
                                    <select name="ruang_lingkup_id" class="form-control" id="ruang_lingkup_id">
                                        <option selected disabled>--Pilih Ruanglingkup aplikasi--</option>
                                    @foreach ($ruang_lingkup as $rl)
                                        <option value="{{$rl->id}}">{{$rl->ruang_lingkup}}</option>
                                    @endforeach
                                    </select>

                                    <div class="validate text-danger">
                                        @if($errors->has('ruang_lingkup_id'))
                                            {{ $errors->first('ruang_lingkup_id')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-9 offset-1">
                                    <label for="jenis_database">Jenis database aplikasi</label>
                                    <input type="text" value="{{old('jenis_database')}}" class="form-control" name="jenis_database" id="jenis_database" placeholder="Database yang ingin digunakan"/>
                                    
                                    <div class="validate text-danger">
                                        @if($errors->has('jenis_database'))
                                            {{ $errors->first('jenis_database')}}
                                        @endif
                                    </div>
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