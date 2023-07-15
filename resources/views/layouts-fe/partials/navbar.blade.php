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
              <li><a href="#">UKM</a></li>
              <li><a href="#">BKM</a></li>
              <li><a href="#">HIMA</a></li>
              <!-- <li><a href="{{ route('organisasi-ukm') }}">UKM</a></li>
              <li><a href="{{ route('organisasi-bem') }}">BEM</a></li> -->
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>SIMBELMAWA</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            
              <li><a href="#">Hibah</a></li>
              <!-- <li><a href="{{route('kegiatan','&tipe=Teknologi%20Informasi')}}">Simblemawa</a></li>
              <li><a href="{{route('kegiatan','&tipe=Teknologi%20Informasi')}}">PKM 8 Bidang</a></li> -->
                
              </li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Prestasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            
              <li><a href="#">Akademik</a></li>                
              <li><a href="#">Non Akademik</a></li>                
              </li>
            </ul>
          </li>

          <li><a href="#">Berita</a></li>
          <li><a href="#">Contact</a></li>
          <!-- <li><a href="{{ route('pengumuman') }}">Berita</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>