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
            <li class="nav-item {{ Route::currentRouteName()== 'kendaraan' ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('kecelakaan') }}">
                    <i class="material-icons">airport_shuttle</i>
                    <p>Data Kendaraan</p>
                </a>
            </li>
            <li class="nav-item {{ (Request::is('kecelakaan/*') || Request::is('kecelakaan') ? 'active' : '') }} ">
                <a class="nav-link" href="{{ route('kecelakaan') }}">
                    <i class="material-icons">book</i>
                    <p>Data Kecelakaan</p>
                </a>
            </li>
            <!-- your sidebar here -->
        </ul>
    </div>
</div>
