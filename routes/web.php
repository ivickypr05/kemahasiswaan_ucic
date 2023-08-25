<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BkmController;
use App\Http\Controllers\PkkController;
use App\Http\Controllers\PkmController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\HimaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrestasiNonAkademikController;
use App\Http\Controllers\ProfilBkmController;
use App\Http\Controllers\PrestasiAkademikController;
use App\Http\Controllers\ProfilHimaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $data['page_title'] = "Home Kemahasiswaan";
//     return view('frontend.home', $data);
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('beasiswa', [BeasiswaController::class, 'frontBeasiswa'])->name('beasiswa');
Route::get('beasiswa/{id}', [BeasiswaController::class, 'show'])->name('detail-beasiswa');

Route::get('prestasi-akademik', [PrestasiAkademikController::class, 'frontPrestasiakademik'])->name('prestasi-akademik');
Route::get('prestasi-akademik-detail/{id}', [PrestasiAkademikController::class, 'show'])->name('detail-prestasi-akademik');

Route::get('prestasi-nonakademik', [PrestasiNonAkademikController::class, 'frontPrestasinonakademik'])->name('prestasi-nonakademik');
Route::get('prestasi-nonakademik-detail/{id}', [PrestasiNonAkademikController::class, 'show'])->name('detail-prestasi-nonakademik');


Route::get('organisasi-ukm', [UkmController::class, 'frontUkm'])->name('organisasi-ukm');
Route::get('organisasi-ukm/{id}', [UkmController::class, 'show'])->name('detail-ukm');

Route::get('organisasi-bkm', [BkmController::class, 'frontBkm'])->name('organisasi-bkm');
Route::get('organisasi-bkm/{id}', [BkmController::class, 'show'])->name('detail-bkm');
Route::get('profil-bkm', [ProfilBkmController::class, 'frontProfilBkm'])->name('profil-bkm');

Route::get('organisasi-hima', [HimaController::class, 'frontHima'])->name('organisasi-hima');
Route::get('organisasi-hima/{id}', [HimaController::class, 'show'])->name('detail-hima');
Route::get('profil-himatif', [ProfilHimaController::class, 'himatif'])->name('profil-himatif');
Route::get('profil-himasi', [ProfilHimaController::class, 'himasi'])->name('profil-himasi');
Route::get('profil-himadkv', [ProfilHimaController::class, 'himadkv'])->name('profil-himadkv');
Route::get('profil-himaku', [ProfilHimaController::class, 'himaku'])->name('profil-himaku');
Route::get('profil-himajemen', [ProfilHimaController::class, 'himajemen'])->name('profil-himajemen');
Route::get('profil-himaka', [ProfilHimaController::class, 'himaka'])->name('profil-himaka');
Route::get('profil-himami', [ProfilHimaController::class, 'himami'])->name('profil-himami');
Route::get('profil-himabis', [ProfilHimaController::class, 'himabis'])->name('profil-himabis');

Route::get('pkm', [PkmController::class, 'frontPkm'])->name('pkm');
Route::get('pkm/{id}', [PkmController::class, 'show'])->name('detail-pkm');

Route::get('pkk', [PkkController::class, 'frontPkk'])->name('pkk');
Route::get('pkk/{id}', [PkkController::class, 'show'])->name('detail-pkk');

Route::get('berita', [BeritaController::class, 'frontBerita'])->name('berita');
Route::get('berita/{id}', [BeritaController::class, 'show'])->name('detail-berita');

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('send-mail', [ContactController::class, 'sendMail'])->name('send-mail');


// admmin

Route::get('login', function () {
    return view('admin.auth.login');
})->name('login');


Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::middleware('checkRole:bkm,ukm,hima')->group(function () {
    // Category Prestasi Manajemen
    Route::get('category-list', [CategoryController::class, 'index'])->name('category-list');
    Route::get('category-create', [CategoryController::class, 'create'])->name('category-create');
    Route::post('category-store', [CategoryController::class, 'store'])->name('category-store');
    Route::get('category-edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::post('category-update/{id}', [CategoryController::class, 'update'])->name('category-update');
    Route::get('category-destroy/{id}', [CategoryController::class, 'destroy'])->name('category-destroy');

    // Prestasi Akademik Manajemen
    Route::get('prestasi-akademik-list', [PrestasiAkademikController::class, 'index'])->name('prestasi-akademik-list');
    Route::get('prestasi-akademik-create', [PrestasiAkademikController::class, 'create'])->name('prestasi-akademik-create');
    Route::post('prestasi-akademik-store', [PrestasiAkademikController::class, 'store'])->name('prestasi-akademik-store');
    Route::get('prestasi-akademik-edit/{id}', [PrestasiAkademikController::class, 'edit'])->name('prestasi-akademik-edit');
    Route::post('prestasi-akademik-update/{id}', [PrestasiAkademikController::class, 'update'])->name('prestasi-akademik-update');
    Route::get('prestasi-akademik-destroy/{id}', [PrestasiAkademikController::class, 'destroy'])->name('prestasi-akademik-destroy');

    // Prestasi Non Akademik Manajemen
    Route::get('prestasi-nonakademik-list', [PrestasiNonAkademikController::class, 'index'])->name('prestasi-nonakademik-list');
    Route::get('prestasi-nonakademik-create', [PrestasiNonAkademikController::class, 'create'])->name('prestasi-nonakademik-create');
    Route::post('prestasi-nonakademik-store', [PrestasiNonAkademikController::class, 'store'])->name('prestasi-nonakademik-store');
    Route::get('prestasi-nonakademik-edit/{id}', [PrestasiNonAkademikController::class, 'edit'])->name('prestasi-nonakademik-edit');
    Route::post('prestasi-nonakademik-update/{id}', [PrestasiNonAkademikController::class, 'update'])->name('prestasi-nonakademik-update');
    Route::get('prestasi-nonakademik-destroy/{id}', [PrestasiNonAkademikController::class, 'destroy'])->name('prestasi-nonakademik-destroy');
});

Route::middleware(['auth', 'kemahasiswaan'])->group(function () {
    //Beasiswa Manajemen
    Route::get('beasiswa-list', [BeasiswaController::class, 'index'])->name('beasiswa-list');
    Route::get('beasiswa-create', [BeasiswaController::class, 'create'])->name('beasiswa-create');
    Route::post('beasiswa-store', [BeasiswaController::class, 'store'])->name('beasiswa-store');
    Route::get('beasiswa-edit/{id}', [BeasiswaController::class, 'edit'])->name('beasiswa-edit');
    Route::post('beasiswa-update/{id}', [BeasiswaController::class, 'update'])->name('beasiswa-update');
    Route::get('beasiswa-destroy/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa-destroy');

    Route::get('pkm-list', [PkmController::class, 'index'])->name('pkm-list');
    Route::get('pkm-create', [PkmController::class, 'create'])->name('pkm-create');
    Route::post('pkm-store', [PkmController::class, 'store'])->name('pkm-store');
    Route::get('pkm-edit/{id}', [PkmController::class, 'edit'])->name('pkm-edit');
    Route::post('pkm-update/{id}', [PkmController::class, 'update'])->name('pkm-update');
    Route::get('pkm-destroy/{id}', [PkmController::class, 'destroy'])->name('pkm-destroy');

    Route::get('pkk-list', [PkkController::class, 'index'])->name('pkk-list');
    Route::get('pkk-create', [PkkController::class, 'create'])->name('pkk-create');
    Route::post('pkk-store', [PkkController::class, 'store'])->name('pkk-store');
    Route::get('pkk-edit/{id}', [PkkController::class, 'edit'])->name('pkk-edit');
    Route::post('pkk-update/{id}', [PkkController::class, 'update'])->name('pkk-update');
    Route::get('pkk-destroy/{id}', [PkkController::class, 'destroy'])->name('pkk-destroy');

    Route::get('berita-list', [BeritaController::class, 'index'])->name('berita-list');
    Route::get('berita-create', [BeritaController::class, 'create'])->name('berita-create');
    Route::post('berita-store', [BeritaController::class, 'store'])->name('berita-store');
    Route::get('berita-edit/{id}', [BeritaController::class, 'edit'])->name('berita-edit');
    Route::post('berita-update/{id}', [BeritaController::class, 'update'])->name('berita-update');
    Route::get('berita-destroy/{id}', [BeritaController::class, 'destroy'])->name('berita-destroy');

    Route::get('user-list', [UserController::class, 'index'])->name('user-list');
    Route::get('user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('user-store', [UserController::class, 'store'])->name('user-store');
    Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::get('user-destroy/{id}', [UserController::class, 'destroy'])->name('user-destroy');
});

Route::middleware(['auth', 'bkm'])->group(function () {
    // Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Organisasi BKM Manajemmen
    Route::get('bkm-list', [BkmController::class, 'index'])->name('bkm-list');
    Route::get('bkm-create', [BkmController::class, 'create'])->name('bkm-create');
    Route::post('bkm-store', [BkmController::class, 'store'])->name('bkm-store');
    Route::get('bkm-edit/{id}', [BkmController::class, 'edit'])->name('bkm-edit');
    Route::post('bkm-update/{id}', [BkmController::class, 'update'])->name('bkm-update');
    Route::get('bkm-destroy/{id}', [BkmController::class, 'destroy'])->name('bkm-destroy');
    //Sturktur Organisasi BKM Manajemen
    Route::get('profil-bkm-list', [ProfilBkmController::class, 'index'])->name('profil-bkm-list');
    Route::get('profil-bkm-create', [ProfilBkmController::class, 'create'])->name('profil-bkm-create');
    Route::post('profil-bkm-store', [ProfilBkmController::class, 'store'])->name('profil-bkm-store');
    Route::get('profil-bkm-edit/{id}', [ProfilBkmController::class, 'edit'])->name('profil-bkm-edit');
    Route::post('profil-bkm-update/{id}', [ProfilBkmController::class, 'update'])->name('profil-bkm-update');
    Route::get('profil-bkm-destroy/{id}', [ProfilBkmController::class, 'destroy'])->name('profil-bkm-destroy');
});

Route::middleware(['auth', 'ukm'])->group(function () {
    // Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Organisasi UKM Manajemen
    Route::get('ukm-list', [UkmController::class, 'index'])->name('ukm-list');
    Route::get('ukm-create', [UkmController::class, 'create'])->name('ukm-create');
    Route::post('ukm-store', [UkmController::class, 'store'])->name('ukm-store');
    Route::get('ukm-edit/{id}', [UkmController::class, 'edit'])->name('ukm-edit');
    Route::post('ukm-update/{id}', [UkmController::class, 'update'])->name('ukm-update');
    Route::get('ukm-destroy/{id}', [UkmController::class, 'destroy'])->name('ukm-destroy');
});

Route::middleware(['auth', 'hima'])->group(function () {
    // Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('hima-list', [HimaController::class, 'index'])->name('hima-list');
    Route::get('hima-create', [HimaController::class, 'create'])->name('hima-create');
    Route::post('hima-store', [HimaController::class, 'store'])->name('hima-store');
    Route::get('hima-edit/{id}', [HimaController::class, 'edit'])->name('hima-edit');
    Route::post('hima-update/{id}', [HimaController::class, 'update'])->name('hima-update');
    Route::get('hima-destroy/{id}', [HimaController::class, 'destroy'])->name('hima-destroy');
});
