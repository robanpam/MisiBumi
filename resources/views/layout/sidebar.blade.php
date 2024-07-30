<div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">MisiBumi</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item @yield('dashboard_aktif')">
                    <a href="{{route('dashboard.show')}}" class="sidebar-link">
                        <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item @yield('profile_aktif')">
                    <a href="{{ route('profileadmin') }}" class="sidebar-link">
                        <img src="{{ asset('profile_pictures/' . auth()->user()->profile_photo) }}" class="nav-profile ms-n5" alt="">
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item @yield('kelolak_aktif')">
                    <a href="{{ route('kelolakampanye') }}" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Kelola Kampanye</span>
                    </a>
                </li>
                <li class="sidebar-item @yield('kelolaa_aktif')">
                    <a href="{{route('kelolaartikel')}}" class="sidebar-link">
                        <i class="lni lni-layout"></i>
                        <span>Kelola Artikel</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="{{ route('profile.logout') }}" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
</div>