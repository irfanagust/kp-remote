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
                            Aplikasi yang telah Anda ajukan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="input-group">
                            <form action="{{route('form-create')}}">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Sudahkah mengecek repositori software ?')">Buat pengajuan software</button>
                            </form>
                        </div>
                        <div class="input-group">
                            <p class="text text-danger">Sebelum anda mengajukan, silahkan cek pada</p><a href="#">Repositori Software</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach ($software as $soft)
            {{-- CARD --}}
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card mb-3">
                    <h5 class="card-header text-center">{{$soft->nama_perangkat_lunak}}</h5>
                    <div class="card-body col-md offset-2">
                        <div class="input-group">
                            @if ($soft->progres_id==0)
                            <p>Status : </p>
                            <h5>{{$soft->status->status}}</h5>
                            @else
                            <p>Progres : </p>
                            <h5 class="text text-success">Berhasil dibuat</h5>
                            @endif
                        </div>
                        <div class="input-group">
                            <a href="/user/pengajuan/{{$soft->id}}/detail" class="btn btn-secondary" type="button">Detail</a>|

                            @if ($soft->status_id==1)
                                <a href="/user/pengajuan/{{$soft->id}}/ubah" class="btn btn-warning" type="button">Ubah</a>
                            @elseif($soft->status_id==2)
                                <button type="submit" class="btn btn-warning" 
                                    onclick="return alert('Tidak bisa mengubah, Aplikasi telah DISETUJUI. Informasi lebih lanjut silahkan hubungi DINKOMINFO')">
                                    Ubah
                                </button>
                            @elseif ($soft->status_id==3)
                                <a href="/user/pengajuan/{{$soft->id}}/ubah" class="btn btn-warning" type="button">Ubah</a>
                            @else
                                <button type="submit" class="btn btn-warning" 
                                    onclick="return alert('Tidak bisa mengubah, Aplikasi telah DITOLAK. Informasi lebih lanjut silahkan hubungi DINKOMINFO')">
                                    Ubah
                                </button>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
@endsection