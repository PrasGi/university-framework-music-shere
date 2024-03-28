<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo-large.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.png"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        @include('components.nav-profile')
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items @if (Route::currentRouteName() == 'dashboard') active @endif">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items  @if (Str::contains(Route::currentRouteName(), 'music')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#item-music" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-music-note"></i>
                </span>
                <span class="menu-title">Music</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="item-music">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('music.index') }} @if (Route::currentRouteName() == 'music.index') active @endif">My
                            Music</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Analysis</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="#">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Forum comunication</span>
            </a>
        </li>
    </ul>
</nav>
