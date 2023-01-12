<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav ">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}" aria-current="page" href="{{ url('admin')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/riwayat')) ? 'active' : '' }}" href="{{ url('admin/riwayat')}}">
                    <span data-feather="clock" class="align-text-bottom"></span>
                    Riwayat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/gejala*')) ? 'active' : '' }}" href="{{ route('gejala.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Data Gejala
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/kerusakan*')) ? 'active' : '' }}" href="{{ route('kerusakan.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Data Kerusakan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <span data-feather="power" class="align-text-bottom" nclick="event.preventDefault(); document.getElementById('logout-form').submit();"></span>
                    Logout
                </a>
            </li>

        </ul>

    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>