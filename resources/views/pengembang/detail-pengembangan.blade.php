@extends('pengembang.partials.master')
@section('content')
<div class="hero-section inner-page">
    <div class="wave">
        <svg width="100%" height="100%  " viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg"
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
                            {{$software->nama_perangkat_lunak}}
                        </h1>
                        <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Diajukan oleh
                            &bullet; {{$software->instansi->nama}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
    <div class="container">
        <div class="row">

            {{-- kolom konten --}}
            <div class="col-md-12 blog-content">

                <hr>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-truncate text-primary">
                            <a class="text text-primary" stream href="{{Storage::url('/app/file/instansi/document/'.$software->fileSOP)}}">File SOP</a>
                        </h5>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Fungsi :
                        </h5>
                        <p>{{$software->fungsi}}</p>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Jenis Layanan :
                        </h5>
                        <p>{{$software->jenis_layanan->jenis_layanan}}</p>

                        <h5 class="card-title text-muted text-truncate">
                            Basis Aplikasi :
                        </h5>
                        <p>{{$software->basis->basis}}</p>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Sistem operasi :
                        </h5>
                        <p>{{$software->sistem_operasi->sistem_operasi}}</p>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Jenis pengguna :
                        </h5>
                        <p>{{$software->pengguna->pengguna_layanan}}</p>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Jumlah pengguna :
                        </h5>
                        <p>{{$software->jumlah_pemakai->jumlah_pemakai}} Orang</p>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Ruang lingkup Aplikasi:
                        </h5>
                        <p>{{$software->ruang_lingkup->ruang_lingkup}}</p>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Database :
                        </h5>
                        <p>{{$software->jenis_database}}</p>
                        
                        <h5 class="card-title text-muted text-truncate">
                            Keterangan Tambahan :
                        </h5>
                        <p>{{$software->deskripsi}}</p>
                        
                        <a class="btn btn-secondary" type="button" href="/pengembang/pengembangan-saya">
                            Kembali
                        </a>
                        @if ($software->progres_id == 0)
                                <a href="/pengembang/pengembangan-saya/{{$software->id}}/progress" class="btn btn-success ml-1" type="button"
                                    onclick="return confirm('Software telah sepenuhnya selesai ?')"
                                    >
                                    Selesai
                                </a>
                            @elseif ($software->progres_id == 1)
                                <a class="btn btn-success ml-1" type="button" disable>
                                    Software telah selesai
                                </a>
                            @else
                                <a class="btn btn-info ml-1" type="button" disable>
                                    Menunggu konfirmasi
                                </a>
                            @endif
                    </div>
                </div>

            </div>
            {{-- END kolom berita --}}

        </div>
    </div>
</section>
@endsection