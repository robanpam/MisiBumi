<nav class="navbar navbar-expand-lg bg-body-tertiary px-4 navbar-prop">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link color @yield('kampanye_aktif')" aria-current="page" href="#">Kampanye</a>
        </li>
        <li class="nav-item ps-lg-3">
          <a class="nav-link color @yield('kalku_aktif')" aria-current="page" href="{{ route('kalkulator.list') }}">Kalkulator</a>
        </li>
        <li class="nav-item px-lg-3">
          <a class="nav-link color @yield('dampak_aktif')" aria-current="page" href="#">Dampak</a>
        </li>
        @if (auth()->user())
          <a class="nav-link color @yield('history_aktif')" aria-current="page" href="{{ route('profile.history') }}">
            <div class="d-flex align-items-center">
              <div class="nav-profile"></div>
              <div class="ms-2">
                {{ auth()->user()->name }}
              </div>
            </div>
          </a>
        @else
          <button class="outline-button btn px-4">
              Login
          </button>
        @endif
      </ul>
    </div>
  </div>
</nav>