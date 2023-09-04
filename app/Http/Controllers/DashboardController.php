<?php

namespace App\Http\Controllers;

use App\Models\Bkm;
use App\Models\Pkk;
use App\Models\Pkm;
use App\Models\Ukm;
use App\Models\Hima;
use App\Models\User;
use App\Models\Berita;
use App\Models\Beasiswa;
use App\Models\Preakademik;
use Illuminate\Http\Request;
use App\Models\Prenonakademik;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $data['page_title'] = 'Dashboard';
        $data['breadcumb'] = 'Dashboard';

        $data['beasiswa'] = Beasiswa::count();
        $data['prestasi'] = Preakademik::count() + Prenonakademik::count();
        $data['kegiatan'] = Bkm::count() + Ukm::count() + Hima::count();
        $data['simbelmawa'] = Pkm::count() + Pkk::count();
        $data['berita'] = Berita::count();
        $data['pengguna'] = User::count();

        return view('admin.dashboard.index', $data);
    }
}
