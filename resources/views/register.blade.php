@extends('partials.master')
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
                            Registrasi untuk lebih banyak fitur
                        </h1>
                        <p class="mb-5 text-warning" data-aos="fade-up"  data-aos-delay="100">
                            Jika anda sebuah instansi, silahkan hubungi DINKOMINFO Banyumas untuk mendapatkan akun
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
                <h2>Form Registrasi</h2>
                <p class="mb-0">
                    Harap isi form dengan data yang benar dan faktual.    
                </p>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-md-6 offset-3"  data-aos="fade-up">
                <form action="{{route('registerProcess')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="role" value="{{2}}">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="nama">Nama lengkap</label>
                            <input value="{{old('nama')}}" type="text" class="form-control" name="nama" id="nama" placeholder="Isikan nama lengkap anda"/>
                            
                            <div class="validate text-danger">
                                @if($errors->has('nama'))
                                    {{ $errors->first('nama')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="nik">NIK</label>
                            <input type="text" value="{{old('nik')}}" class="form-control" name="nik" id="nik" placeholder="Masukkan Nomor Induk Keluarga" />
                            
                            <div class="validate text-danger">
                                @if($errors->has('nik'))
                                    {{ $errors->first('nik')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="portfolio">Portfolio</label>
                            <input type="file" class="form-control" name="portfolio" id="portfolio"/>
                            
                            <div class="validate text-danger">
                                @if($errors->has('portfolio'))
                                    {{ $errors->first('portfolio')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Jelaskan keahlian anda dan siapa anda">{{old('deskripsi')}}</textarea>
                            
                            <div class="validate text-danger">
                                @if($errors->has('deskripsi'))
                                    {{ $errors->first('deskripsi')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" value="{{old('alamat')}}" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat tempat tinggal anda sekarang" />
                            
                            <div class="validate text-danger">
                                @if($errors->has('alamat'))
                                    {{ $errors->first('alamat')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="no_hp">Nomor Telepon/HP</label>
                            <input type="tel" value="{{old('no_hp')}}" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan kontak anda yang bisa dihubungi" />
                            
                            <div class="validate text-danger">
                                @if($errors->has('no_hp'))
                                    {{ $errors->first('no_hp')}}
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{old('email')}}" class="form-control" name="email" id="email" placeholder="Masukkan email anda yang valid" />
                            
                            <div class="validate text-danger">
                                @if($errors->has('email'))
                                    {{ $errors->first('email')}}
                                 @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="password">Kata sandi</label>
                            <input type="password" value="{{old('password')}}" class="form-control" name="password" id="password" placeholder="Masukkan kata sandi" />
                            
                            <div class="validate text-danger">
                                @if($errors->has('password'))
                                    {{ $errors->first('password')}}
                                 @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="confirmpassword">Konfirmasi kata sandi</label>
                            <input type="password" class="form-control" name="password_confirmation" id="confirmpassword" placeholder="Masukkan konfirmasi kata sandi" />
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