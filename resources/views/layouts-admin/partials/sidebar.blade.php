<!-- ========== Left Sidebar Start ========== -->
<style>
    span {
        color: white;
    }

    #sidebar-menu {
        background: #0F2B5B;
    }

    .simplebar-content-wrapper {
        background: #0F2B5B;
    }
</style>
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu" style="background-color: #0F2B5B;">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                @if (auth()->user()->role == 'kemahasiswaan')
                    <li>
                        <a href="{{ route('beasiswa-list') }}">
                            <i class="mdi mdi-folder-outline"></i>
                            <span data-key="t-dashboard">Beasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-folder-outline"></i>
                            <span key="t-dashboards">SIMBELMAWA</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('pkm-list') }}" key="t-default">PKM</a></li>
                            <li><a href="{{ route('pkk-list') }}" key="t-default">PPK</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-folder-outline"></i>
                            <span key="t-dashboards">Kelola Konten</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('request-prestasi-akademik') }}" key="t-default">Prestasi Akademik</a>
                            </li>
                            <li><a href="{{ route('request-prestasi-nonakademik') }}" key="t-default">Prestasi Non
                                    Akademik</a></li>
                            <li><a href="{{ route('request-bkm') }}" key="t-default">Kegiatan BKM</a></li>
                            <li><a href="{{ route('request-ukm') }}" key="t-default">Kegiatan UKM</a></li>
                            <li><a href="{{ route('request-hima') }}" key="t-default">Kegiatan HIMA</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('berita-list') }}">
                            <i class="mdi mdi-folder-outline"></i>
                            <span data-key="t-dashboard">Berita</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user-list') }}">
                            <i class="mdi mdi-account-cowboy-hat"></i>
                            <span data-key="t-dashboard">Kelola Pengguna</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'bkm' || auth()->user()->role == 'ukm' || auth()->user()->role == 'hima')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-folder-outline"></i>
                            <span key="t-dashboards">Prestasi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('category-list') }}" key="t-default">Kategori Prestasi</a></li>
                            <li><a href="{{ route('prestasi-akademik-list') }}" key="t-default">Prestasi Akademik</a>
                            </li>
                            <li><a href="{{ route('prestasi-nonakademik-list') }}" key="t-default">Prestasi Non
                                    Akademik</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-folder-outline"></i>
                            <span key="t-dashboards">Organisasi</span>
                        </a>

                        <ul class="sub-menu" aria-expanded="false">
                            @if (auth()->user()->role == 'bkm')
                                <li><a href="{{ route('bkm-list') }}" key="t-default">Kegiatan BKM</a></li>
                                <li><a href="{{ route('profil-bkm-list') }}" key="t-default">Profil BKM</a></li>
                            @endif
                            @if (auth()->user()->role == 'ukm')
                                <li><a href="{{ route('ukm-list') }}" key="t-default">Kegiatan UKM</a></li>
                            @endif
                            @if (auth()->user()->role == 'hima')
                                <li><a href="{{ route('hima-list') }}" key="t-default">Kegiatan HIMA</a></li>
                            @endif
                            {{-- <li><a href="{{ route('struktur-ukm-list') }}" key="t-default">Struktur UKM</a></li>
                        <li><a href="{{ route('struktu-hima-list') }}" key="t-default">Struktur HIMA</a></li> --}}
                        </ul>
                    </li>
                @endif



                <li>
                    <a>
                        <form action="{{ url('/logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn">
                                <i class="mdi mdi-logout"></i>
                                <span data-key="t-dashboard">Logout</span>
                            </button>
                        </form>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
