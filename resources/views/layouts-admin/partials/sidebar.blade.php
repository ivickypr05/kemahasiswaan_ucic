<!-- ========== Left Sidebar Start ========== -->
<style>
span{
    color: white;
}
#sidebar-menu{
    background: #0F2B5B;
}
.simplebar-content-wrapper{
    background: #0F2B5B;
}
</style>
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu" style="background-color: #0F2B5B;">
                @if(auth()->user()->can('dashboard') || auth()->user()->can('master-data') || auth()->user()->can('history-log-list'))
                <li class="menu-title" key="t-menu">Menu</li>
                @endif

                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="{{ route('beasiswa-list') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Beasiswa</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="{{ route('rekap-list') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Rekap Prestasi</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-folder-outline"></i>
                        <span key="t-dashboards">Organisasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ukm-list') }}" key="t-default">Organisasi UKM</a></li>
                        <li><a href="{{ route('bem-list') }}" key="t-default">Organisasi BEM</a></li>
                    </ul>
                </li>
                @endif
           

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-folder-outline"></i>
                        <span key="t-dashboards">Kegiatan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('kegiatan-list','?tipe=Sistem%20informasi') }}" key="t-default">Kegiatan SI</a></li>
                        <li><a href="{{ route('kegiatan-list','?tipe=Teknologi%20Informasi') }}" key="t-default">Kegiatan TI</a></li>
                        <li><a href="{{ route('kegiatan-list','?tipe=Manajemen%20Informasi') }}" key="t-saas">Kegiatan MI</a></li>
                        <li><a href="{{ route('kegiatan-list','?tipe=DKV') }}" key="t-crypto">Kegiatan DKV</a></li>
                        <li><a href="{{ route('kegiatan-list','?tipe=AKUNTANSI') }}" key="kegiatan-ak">Kegiatan AKUNTANSI</a></li>
                    </ul>
                </li>
                @endif


                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="{{ route('master-data.index') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Master Data</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="{{ route('pengumuman-list') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Pengumuman</span>
                    </a>
                </li>
                @endif
              
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