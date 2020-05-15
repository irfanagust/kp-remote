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
                            Pengembangan yang harus anda kerjakan
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

            @foreach ($softwareYangDikembangkan as $software)
            {{-- CARD --}}
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card mb-3">
                    <h5 class="card-header text-center">{{$software->nama_perangkat_lunak}}</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <p>Pengaju:</p><h4>{{$software->instansi->nama}}</h4>
                        </div>
                        <div class="input-group">
                            <a stream href="{{Storage::url('/file/instansi/document/'.$software->fileSOP)}}"><h4 class="text text-primary">File SOP</h4></a>
                        </div>
                        <div class="input-group">
                            <a href="/pengembang/pengembangan-saya/{{$software->id}}/detail-pengembangan" class="btn btn-secondary" type="button">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
@endsection