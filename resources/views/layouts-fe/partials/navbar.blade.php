<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <a href="/" class="logo me-auto"><img src="{{ asset('img/cic.png') }}" alt="" class="img-fluid"></a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('beasiswa') }}" class="{{ request()->routeIs('beasiswa') ? 'active' : '' }}"><span>Beasiswa</span></a></li>
        <li class="dropdown"><a href="#"><span>Prestasi</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="{{ route('prestasi-individu') }}" class="{{ request()->routeIs('prestasi-individu') ? 'active' : '' }}">Prestasi Individu</a></li>
            <li><a href="{{ route('prestasi-tim') }}" class="{{ request()->routeIs('prestasi-tim') ? 'active' : '' }}">Prestasi Tim</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Organisasi Kemahasiswaan</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="{{ route('organisasi-ukm') }}" class="{{ request()->routeIs('organisasi-ukm') ? 'active' : '' }}">UKM</a></li>
            <li><a href="{{ route('organisasi-bkm') }}" class="{{ request()->routeIs('organisasi-bkm') ? 'active' : '' }}">BKM</a></li>
            <li><a href="{{ route('organisasi-hima') }}" class="{{ request()->routeIs('organisasi-hima') ? 'active' : '' }}">HIMA</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#"><span>SIMBELMAWA</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="{{ route('pkm') }}" class="{{ request()->routeIs('pkm') ? 'active' : '' }}">PKM</a></li>
            <li><a href="{{ route('pkk') }}" class="{{ request()->routeIs('pkk') ? 'active' : '' }}">PKK</a></li>
          </ul>
        </li>
        <li><a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'active' : '' }}">Berita</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header>
