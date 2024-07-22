<nav class="navbar navbar-expand-lg bg-body-tertiary px-4 navbar-prop">
    <div class="container-fluid">
        @guest
            <a class="navbar-brand color logo-text" href="{{ route('beranda.show') }}">
                <img src="{{ asset('asset/beranda/Misi Bumi Logo.png') }}" class="misibumi-logo" alt="">
                Misi Bumi
            </a>
        @endguest
        @auth
            @can('admin-gate')
            <a class="navbar-brand color logo-text" href="{{ route('dashboard.show') }}">
                <img src="{{ asset('asset/beranda/Misi Bumi Logo.png') }}" class="misibumi-logo" alt="">
                Misi Bumi
            </a>
            @endcan
        @endauth
            
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link color @yield('beranda_aktif')" aria-current="page" href="{{route('beranda.show')}}">Beranda</a>
                    </li>
                    <li class="nav-item ps-lg-3">
                        <a class="nav-link color @yield('kampanye_aktif')" aria-current="page" href="{{route('mainKampanye')}}">Kampanye</a>
                    </li>
                    <li class="nav-item ps-lg-3">
                        <a class="nav-link color @yield('dampak_aktif')" aria-current="page" href="/dampak">Dampak</a>
                    </li>
                    <li class="nav-item ps-lg-3">
                        <a class="nav-link color @yield('pohon_aktif')" aria-current="page" href="">Pohon</a>
                    </li>
                    <li class="nav-item ps-lg-3 pe-3">
                        <a class="nav-link color @yield('kalku_aktif')" aria-current="page"
                            href="{{ route('kalkulator.list') }}">Kalkulator</a>
                    </li>
                    @if (auth()->user())
                        <a class="nav-link color @yield('history_aktif')" aria-current="page"
                            href="{{ route('profile.history') }}">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_photo) }}" class="nav-profile" alt="">
                                <div class="ms-2">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('session.init') }}">
                            <button class="nav-item outline-button btn px-4 py-0 mt-1">
                                Login
                            </button>
                        </a>
                    @endif
                    @endguest
                    @auth
                    @can('admin-gate')
                    <li class="nav-item">
                        <a class="nav-link color @yield('dashboard_aktif')" aria-current="page" href="{{route('beranda.show')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color @yield('kelolak_aktif') ps-lg-3" aria-current="page" href="{{route('kelolakampanye')}}">Kampanye</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color @yield('kelolaa_aktif') ps-lg-3" aria-current="page" href="{{route('kelolaartikel')}}">Artikel</a>
                    </li>
                    <a class="nav-link color @yield('history_aktif') ps-lg-3" aria-current="page"
                    href="{{ route('profileadmin') }}">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_photo) }}" class="nav-profile" alt="">
                        <div class="ms-2">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                </a>
                @endcan
                @endauth
            </ul>
        </div>
      </nav>