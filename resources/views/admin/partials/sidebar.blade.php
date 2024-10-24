<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Pasti Bisa</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">ea</a>
      </div>
      <ul class="sidebar-menu">

          {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li> --}}

          {{-- <li class="menu-header">Starter</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          </li> --}}
          @if (auth()->user()->hasRole('master'))
          <li class="menu-header">Master Data</li>
          <li class="{{ $title  == 'Users' ? 'active' : '' }}"><a class="nav-link" href="{{ route('master_users') }}"><i class="fas fa-users"></i><span>User</span></a></li>
          <li class="{{ $title  == 'Databases' ? 'active' : '' }}"><a class="nav-link" href="{{ route('databases') }}"><i class="fas fa-server"></i><span>DB</span></a></li>
          @endif

          @if (auth()->user()->hasRole('master') || auth()->user()->hasRole('ph') )
          <li class="menu-header">Produksi</li>
          <li class="{{ $title  == 'Administrasi' ? 'active' : '' }}"><a class="nav-link" href="{{ route('administrasi') }}"><i class="fas fa-wallet"></i><span>Administrasi</span></a></li>
          <li class="{{ $title  == 'Digital Notes' ? 'active' : '' }}"><a class="nav-link" href="{{ route('digitalnotes') }}"><i class="fas fa-copy"></i><span>Digital Notes</span></a></li>
          <li class="{{ $title  == 'Reservasi' ? 'active' : '' }}"><a class="nav-link" href="{{ route('reservasi') }}"><i class="fas fa-address-book"></i><span>Reservasi</span></a></li>
          <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-clipboard-user"></i><span>Kehadiran</span></a></li>
          @endif

          @if (auth()->user()->hasRole('master') || auth()->user()->hasRole('ph') || auth()->user()->hasRole('crew') )
          <li class="menu-header">Dashboard</li>
          <li class="{{ $title  == 'Dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
          <li class="{{ $title  == 'My Digital Notes' ? 'active' : '' }}"><a class="nav-link" href="{{ route('mydigitalnotes') }}"><i class="fa-solid fa-book"></i><span>My Digital Notes</span></a></li>
          <li class="{{ $title  == 'Forum' ? 'active' : '' }}"><a class="nav-link" href="{{ route('forum') }}"><i class="fa-solid fa-user-secret"></i><span>Forum</span></a></li>
          <li class="{{ $title  == 'Check In' ? 'active' : '' }}"><a class="nav-link" href="{{ route('cekin') }}"><i class="fa-solid fa-qrcode"></i><span>Qr Scanner</span></a></li>
          @endif
    </aside>
  </div>
