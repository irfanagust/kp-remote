<header class="site-navbar js-sticky-header site-navbar-target fixed-top" role="banner">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-lg-2">
                <h1 class="mb-0 site-logo">
                    <a href="#"><img src="{{asset('portal/img/betterbanyumas.png')}}"
                            width="120px" alt=""></a>
                </h1>
            </div>

            <div class="col-12 col-md-12 d-none d-lg-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="nav-item"><a href="{{route('pengembang')}}" class="nav-link">Beranda</a></li>
                        <li class="nav-item"><a href="#" class=" nav-link">Berita</a></li>
                        <li class="nav-item"><a href="/pengembang/list-pengembangan" class="nav-link">Aplikasi</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Aplikasi Diikuti</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Pelatihan</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Bantuan</a></li>

                        <li class="has-children">
                            <a href="#">{{Auth::user()->email}}</a>
                            <ul class="dropdown">
                                <li class="dropdown-item">
                                    <a class="nav-link" href="{{ route('logout') }}">{{ __('Keluar') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="dropdown-item">
                                    <a class="nav-link" href="#">{{ __('Profil') }}</a>
                                </li>
                                @endif
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>


            <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

                <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse"
                    data-target="#main-navbar">
                    <span></span>
                </a>
            </div>

        </div>
    </div>

</header>