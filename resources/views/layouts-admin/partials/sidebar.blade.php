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
                    <a href="{{ route('admin.dashboard.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('beasiswa-list') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Beasiswa</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-folder-outline"></i>
                        <span key="t-dashboards">Prestasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('akademik') }}" key="t-default">Akademik</a></li>
                        <li><a href="{{ route('non-akademik') }}" key="t-default">Non Akademik</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-folder-outline"></i>
                        <span key="t-dashboards">Organisasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ukm-list') }}" key="t-default">Organisasi UKM</a></li>
                        <li><a href="{{ route('bkm-list') }}" key="t-default">Organisasi BKM</a></li>
                        <li><a href="{{ route('hima-list') }}" key="t-default">Organisasi HIMA</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-folder-outline"></i>
                        <span key="t-dashboards">SIMBELMAWA</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('pkm-list') }}" key="t-default">PKM</a></li>
                        <li><a href="{{ route('ppk-list') }}" key="t-default">PPK</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('rekap-list') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Rekap Prestasi</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('berita-list') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Berita</span>
                    </a>
                </li>
                <li>
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn"> 
                            <i class="mdi mdi-logout"></i>
                            <span data-key="t-dashboard">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
