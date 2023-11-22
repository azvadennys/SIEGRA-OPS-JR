<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo text-center">
        <img src="{{ asset('favicon.ico') }}" width="45px" alt="">
        <h3>SIEGRA OPS JR</h3>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}  ">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('kendaraan/*') || Request::is('kendaraan') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('kendaraan') }}">
                    <i class="material-icons">airport_shuttle</i>
                    <p>Data Kendaraan</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('kecelakaan/*') || Request::is('kecelakaan') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('kecelakaan') }}">
                    <i class="material-icons">storage</i>
                    <p>Data Kecelakaan</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('penolakan-santunan/*') || Request::is('penolakan-santunan') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('penolakanSantunan') }}">
                    <i class="material-icons">report</i>
                    <p>Penolakan Santunan</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('laporan/*') || Request::is('laporan') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('laporan') }}">
                    <i class="material-icons">report</i>
                    <p>Laporan Santunan</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('laporan/*') || Request::is('laporan') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('laporan') }}">
                    <i class="material-icons">report</i>
                    <p>Laporan Kecelakaan</p>
                </a>
            </li>
            <!-- your sidebar here -->
        </ul>
    </div>
</div>
