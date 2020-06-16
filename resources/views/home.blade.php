@extends('partials.master')
@section('content')
<div class="hero-section">
    <div class="wave">

        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path
                        d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                        id="Path"></path>
                </g>
            </g>
        </svg>

    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 hero-text-image">
                <div class="row">
                    <div class="col-lg-7 text-center text-lg-left">
                        <h1 data-aos="fade-right">Banyumas Kota Cerdas 2020</h1>
                        <p class="mb-5">Lorem ipsum dolor sitamet, consectetur adipisicing elit.</p>
                        <div class="row my-2">
                            <div class="col-md-4">
                                <div class="card bg-transparent border-white">
                                    <a href="#" role="button" class="btn btn-outline-primary">
                                        <h5 class="card-title text-white">pelatihan</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-transparent border-white">
                                    <a href="#" role="button" class="btn btn-outline-primary">
                                        <h5 class="card-title text-white">aplikasi</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-4">
                                <div class="card bg-transparent border-white">
                                    <a href="#" role="button" class="btn btn-outline-primary">
                                        <h5 class="card-title text-white">forum</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-transparent border-white">
                                    <a href="#" role="button" class="btn btn-outline-primary">
                                        <h5 class="card-title text-white">smartcity</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 iphone-wrap mt-5">
                        <img src="{{asset('bootstrap/portal/img/smartcity.png')}}" alt="Image" class="phone-1"
                            data-aos="fade-right">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


{{-- sesi form kontak person --}}
<div class="site-section text-dark mt-3">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center border-bottom">
            <div class="col-md-5" data-aos="fade-up">
                <h2 class="section-heading">Kontak Kami</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 text-center">
                <h3>Alamat</h3>
                <address>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam minus autem
                    adipisci vero necessitatibus</address>
            </div>
            <div class="col-md-4 text-center border-left border-right">
                <h3>Phone Number</h3>
                <p>1234567789</p>
            </div>
            <div class="col-md-4 text-center">
                <h3>email</h3>
                <p>agustiawanirfan866@gmail.com</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">

                <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" placeholder="nama lengkap" class="form-control" id="name"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="email aktif" name="email" id="email"
                                data-rule="email" data-msg="Please enter a valid email" />
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="subject">Subjek</label>
                            <input type="text" class="form-control" placeholder="subjek pertanyaan" name="subject"
                                id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name">Pesan</label>
                            <textarea class="form-control" placeholder="Pesan Anda" name="message" cols="30" rows="10"
                                data-rule="required" data-msg="Please write something for us"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Kirim</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- .site-section -->
@endsection