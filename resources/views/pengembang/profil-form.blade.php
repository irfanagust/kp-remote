@extends('pengembang.partials.master')
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
                            Profil
                        </h1>
                        <p class="mb-5 text-warning" data-aos="fade-up"  data-aos-delay="100">
                            {{Auth::user()->pengembang->nama}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="site-section">
    <div class="container">

        <div class="row">
            
            <div class="col-md-6 offset-3"  data-aos="fade-up">
                <form action="{{route('ubah-profil')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="nama"><h4>Nama</h4></label>
                            <input value="{{old('nama')}}" type="text" class="form-control" name="nama" id="nama" placeholder="Nama lengkap anda"/>
                            <div class="validate text-danger">
                                @if($errors->has('nama'))
                                    {{ $errors->first('nama')}}
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="alamat"><h4>Alamat</h4></label>
                            <input value="{{old('alamat')}}" type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat anda sekarang"/>
                            <div class="validate text-danger">
                                @if($errors->has('alamat'))
                                    {{ $errors->first('alamat')}}
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="email"><h4>Email</h4></label>
                            <input value="{{old('email')}}" type="email" class="form-control" name="email" id="email" placeholder="Email anda yang valid"/>
                            <div class="validate text-danger">
                                @if($errors->has('email'))
                                    {{ $errors->first('email')}}
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="no_hp"><h4>Kontak</h4></label>
                            <input value="{{old('no_hp')}}" type="tel" class="form-control" name="no_hp" id="no_hp" placeholder="Kontak anda yang valid"/>
                            <div class="validate text-danger">
                                @if($errors->has('no_hp'))
                                    {{ $errors->first('no_hp')}}
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection