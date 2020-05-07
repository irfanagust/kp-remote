@extends('user.partials.master')
@section('content')
<div class="hero-section inner-page">
    <div class="wave">
        <svg width="100%" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path
                        d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z"
                        id="Path"></path>
                </g>
            </g>
        </svg>

    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-10 text-center hero-text">
                        <h1 data-aos="fade-up" data-aos-delay="">
                            Pengajuan software
                        </h1>
                        <p class="mb-5" data-aos="fade-up"  data-aos-delay="100">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
    <div class="container">
        <div class="row mb-5 align-items-end">
            <div class="col-md-6 offset-3" data-aos="fade-up">
                <h2>Form Pengajuan Pembuatan Software</h2>
                <p class="mb-0">Harap isi form dengan teliti dan jawaban yang benar.</p>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-md-6 offset-3"  data-aos="fade-up">
                <form action="{{route('create')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="nama_perangkat_lunak">Nama perangkat lunak</label>
                            <input value="{{old('nama_perangkat_lunak')}}" type="text" class="form-control" name="nama_perangkat_lunak" id="nama_perangkat_lunak" placeholder="Nama Aplikasi"/>
                            
                            <div class="validate text-danger">
                                @if($errors->has('nama_perangkat_lunak'))
                                    {{ $errors->first('nama_perangkat_lunak')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="fileSOP">File SOP</label>
                            <input type="file" class="form-control" name="fileSOP" id="fileSOP" placeholder="Sertakan file dokumentasi aplikasi"/>
                            
                            <div class="validate text-danger">
                                @if($errors->has('fileSOP'))
                                    {{ $errors->first('fileSOP')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="deskripsp">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Jelaskan secara detail apa saja goals dari software ini">{{old('deskripsi')}}</textarea>
                            
                            <div class="validate text-danger">
                                @if($errors->has('deskripsi'))
                                    {{ $errors->first('deskripsi')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="fungsi">Fungsi</label>
                            <input type="text" value="{{old('fungsi')}}" class="form-control" name="fungsi" id="fungsi" placeholder="Fungsi utama dari software" />
                            
                            <div class="validate text-danger">
                                @if($errors->has('fungsi'))
                                    {{ $errors->first('fungsi')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
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
                        <div class="col-md-6 form-group">
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
                        <div class="col-md-6 form-group">
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
                        <div class="col-md-6 form-group">
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
                        <div class="col-md-6 form-group">
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
                        <div class="col-md-6 form-group">
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
                        <div class="col-md-12 form-group">
                            <label for="jenis_database">Jenis database aplikasi</label>
                            <input type="text" value="{{old('jenis_database')}}" class="form-control" name="jenis_database" id="jenis_database" placeholder="Database yang ingin digunakan"/>
                            
                            <div class="validate text-danger">
                                @if($errors->has('jenis_database'))
                                    {{ $errors->first('jenis_database')}}
                                 @endif
                            </div>
                        </div>
    
                        <div class="col-md-6 form-group">
                            <button type="submit" class="btn btn-primary d-block w-100" >Buat</button>
                        </div>
                  </div>
                </form>
            </div>
          
        </div>
    </div>
</section>
@endsection