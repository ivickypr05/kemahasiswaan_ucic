<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
    <a href="/" class="logo me-auto"><img src="{{ asset('img/cic.png') }}" alt="" class="img-fluid"></a>
      <nav id="navbar" class="navbar">
        <ul>
          {{-- <li><a href="{{ route('home') }}" class="active">Home</a></li> --}}
          <li><a href="{{ route('home') }}" >Home</a></li>
         
          <li><a href="{{ route('beasiswa') }}"><span>Beasiswa</span></a></li>
          <li class="dropdown"><a href="#"><span>Organisasi Kemahasiswaan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('organisasi-ukm') }}">UKM</a></li>
              <li><a href="{{ route('organisasi-bem') }}">BEM</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Agenda kemahasiswaan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <!-- <li class="dropdown"><a href="#"><span>Prodi</span> <i class="bi bi-chevron-right"></i></a> -->
              <li><a href="{{route('kegiatan','&tipe=Teknologi%20Informasi')}}">Simblemawa</a></li>
              <li><a href="{{route('kegiatan','&tipe=Teknologi%20Informasi')}}">PKM 8 Bidang</a></li>
                <ul>
                  <!-- <li><a href="{{route('kegiatan','&tipe=Teknologi%20Informasi')}}">Simblemawa</a></li>
                  <li><a href="{{route('kegiatan','&tipe=Teknologi%20Informasi')}}">PKM 8 Bidang</a></li> -->
                  <!-- <li><a href="{{route('kegiatan','&tipe=Teknologi%20Informasi')}}">TI</a></li>
                  <li><a href="{{route('kegiatan','&tipe=Manajemen%20Informasi')}}">MI</a></li>
                  <li><a href="{{route('kegiatan','&tipe=Sistem%20informasi')}}">SI</a></li>
                  <li><a href="{{route('kegiatan','&tipe=DKV')}}">DKV</a></li>
                  <li><a href="{{route('kegiatan','&tipe=AKUNTANSI')}}">AKUNTANSI</a></li> -->
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="{{ route('pengumuman') }}">Berita</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>