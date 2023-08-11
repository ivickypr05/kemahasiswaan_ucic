<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <a href="/" class="logo me-auto"><img src="{{ asset('img/cic.png') }}" alt="" class="img-fluid"></a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'active' : '' }}"><strong>Home</strong></a></li>
                <li><a href="{{ route('beasiswa') }}"
                        class="{{ request()->routeIs('beasiswa') ? 'active' : '' }}"><span><strong>Beasiswa</strong></span></a>
                </li>
                <li class="dropdown"><a href="#"
                        class="{{ request()->routeIs('prestasi-akademik', 'prestasi-nonakademik') ? 'active' : '' }}"><span>
                            <strong>Prestasi</strong></span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('prestasi-akademik') }}"
                                class="{{ request()->routeIs('prestasi-akademik') ? 'active' : '' }}"><strong>Prestasi
                                    Akademik</strong></a></li>
                        <li><a href="{{ route('prestasi-nonakademik') }}"
                                class="{{ request()->routeIs('prestasi-nonakademik') ? 'active' : '' }}"><strong>Prestasi
                                    Non
                                    Akademik</strong></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"
                        class="{{ request()->routeIs('organisasi-bkm', 'organisasi-ukm', 'organisasi-hima') ? 'active' : '' }}"><span><strong>Organisasi
                                Kemahasiswaan</strong></span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('organisasi-bkm') }}"
                                class="{{ request()->routeIs('organisasi-bkm') ? 'active' : '' }}"><strong>BKM</strong></a>
                        </li>
                        <li><a href="{{ route('organisasi-ukm') }}"
                                class="{{ request()->routeIs('organisasi-ukm') ? 'active' : '' }}"><strong>UKM
                                </strong></a></li>
                        <li><a href="{{ route('organisasi-hima') }}"
                                class="{{ request()->routeIs('organisasi-hima') ? 'active' : '' }}"><strong>HIMA</strong></a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"
                        class="{{ request()->routeIs('pkm', 'pkk') ? 'active' : '' }}"><span><strong>SIMBELMAWA</strong></span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('pkm') }}"
                                class="{{ request()->routeIs('pkm') ? 'active' : '' }}"><strong>PKM
                                    8 Bidang</strong></a></li>
                        <li><a href="{{ route('pkk') }}"
                                class="{{ request()->routeIs('pkk') ? 'active' : '' }}"><strong>PPK
                                    Ormawa</strong></a></li>
                    </ul>
                </li>
                <li><a href="{{ route('berita') }}"
                        class="{{ request()->routeIs('berita') ? 'active' : '' }}"><strong>Berita </strong></a></li>
                <li><a href="{{ route('contact') }}"
                        class="{{ request()->routeIs('contact') ? 'active' : '' }}"><strong>Contact</strong></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>
