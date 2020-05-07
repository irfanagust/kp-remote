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
                            Ubah Pengajuan
                        </h1>
                        <p class="mb-5" data-aos="fade-up"  data-aos-delay="100">
                            {{$software->nama_perangkat_lunak}}
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
                <h2>Form Ubah</h2>
                <p class="mb-0">Harap isi form dengan teliti dan jawaban yang benar.</p>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-md-6 offset-3"  data-aos="fade-up">
                <form action="#" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="nama">Nama perangkat lunak</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Software" value="{{$software->nama_perangkat_lunak}}"/>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="fileSOP">File SOP</label>
                            <input type="file" class="form-control" name="fileSOP" id="fileSOP" placeholder="Sertakan file dokumentasi aplikasi" value="{{$software->fileSOP}}"/>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="deskripsp">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Jelaskan secara detail apa saja goals dari software ini">{{$software->deskripsi}}</textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="fungsi">Fungsi</label>
                            <input type="text" class="form-control" name="fungsi" id="fungsi" placeholder="Fungsi utama dari software" value="{{$software->fungsi}}" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="jenis_layanan_id">Jenis Layanan</label>
                            <select name="jenis_layanan_id" class="form-control" id="jenis_layanan_id">
                                <option selected value="{{$software->jenis_layanan_id}}">{{$software->jenis_layanan->jenis_layanan}}</option>
                                @foreach ($jenis_layanan as $jl)
                                <option value="{{$jl->id}}">{{$jl->jenis_layanan}}</option>
                                @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="jumlah_pemakai_id">Kisaran jumlah pemakai</label>
                            <select name="jumlah_pemakai_id" class="form-control" id="jumlah_pemakai_id">
                                <option selected value="{{$software->jumlah_pemakai_id}}">{{$software->jumlah_pemakai->jumlah_pemakai}}</option>
                              @foreach ($jumlah_pemakai as $jp)
                                <option value="{{$jp->id}}">{{$jp->jumlah_pemakai}}</option>
                              @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="basis">Basis aplikasi</label>
                            <select name="basis" class="form-control" id="basis">
                                <option selected value="{{$software->basis_id}}">{{$software->basis->basis}}</option>
                              @foreach ($basis as $b)
                                <option value="{{$b->id}}">{{$b->basis}}</option>
                              @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="sistem_operasi">Sistem operasi yang digunakan</label>
                            <select name="sistem_operasi" class="form-control" id="sistem_operasi">
                                <option selected value="{{$software->sistem_operasi_id}}">{{$software->sistem_operasi->sistem_operasi}}</option>
                              @foreach ($sistem_operasi as $so)
                                <option value="{{$so->id}}">{{$so->sistem_operasi}}</option>
                              @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="pengguna">Target pengguna aplikasi</label>
                            <select name="pengguna" class="form-control" id="pengguna">
                                <option selected value="{{$software->pengguna_id}}">{{$software->pengguna->pengguna_layanan}}</option>
                              @foreach ($pengguna as $peng)
                                <option value="{{$peng->id}}">{{$peng->pengguna_layanan}}</option>
                              @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="ruang_lingkup">Ruanglingkup Aplikasi</label>
                            <select name="ruang_lingkup" class="form-control" id="ruang_lingkup">
                                <option selected value="{{$software->ruang_lingkup_id}}">{{$software->ruang_lingkup->ruang_lingkup}}</option>
                              @foreach ($ruang_lingkup as $rl)
                                <option value="{{$rl->id}}">{{$rl->ruang_lingkup}}</option>
                              @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="jenis_database">Jenis database aplikasi</label>
                            <input type="text" class="form-control" name="jenis_database" id="jenis_database" placeholder="Database yang ingin digunakan" value="{{$software->jenis_database}}"/>
                            <div class="validate"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="loading">Memuat</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Aplikasi telah diubah. Terima kasih!</div>
                        </div>
    
                        <div class="col-md-6 form-group">
                            <input type="submit" class="btn btn-primary d-block w-100" value="Ubah">
                        </div>
                  </div>
    
                </form>
            </div>
          
        </div>
    </div>
</section>
@endsection