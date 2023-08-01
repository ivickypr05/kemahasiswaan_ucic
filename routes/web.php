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
use App\Http\Controllers\PrestasiTimController;
use App\Http\Controllers\StrukturBkmController;
use App\Http\Controllers\PrestasiIndividuController;
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

Route::get('prestasi-individu', [PrestasiIndividuController::class, 'frontPrestasiIndividu'])->name('prestasi-individu');
Route::get('prestasi-individu-detail/{id}', [PrestasiIndividuController::class, 'show'])->name('detail-prestasi-individu');

Route::get('prestasi-tim', [PrestasiTimController::class, 'frontPrestasiTim'])->name('prestasi-tim');
Route::get('prestasi-tim-detail/{id}', [PrestasiTimController::class, 'show'])->name('detail-prestasi-tim');


Route::get('organisasi-ukm', [UkmController::class, 'frontUkm'])->name('organisasi-ukm');
Route::get('organisasi-ukm/{id}', [UkmController::class, 'show'])->name('detail-ukm');

Route::get('organisasi-bkm', [BkmController::class, 'frontBkm'])->name('organisasi-bkm');
Route::get('organisasi-bkm/{id}', [BkmController::class, 'show'])->name('detail-bkm');
Route::get('struktur-bkm', [StrukturBkmController::class, 'frontStrukturBkm'])->name('struktur-bkm');

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
    $data['page_title'] = "Login Admin";
    return view('admin.auth.login', $data);
})->name('login');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('loginPost2', [UserController::class, 'loginPost2'])->name('loginPost2');
Route::post('loginPostAdmin', [UserController::class, 'loginPostAdmin'])->name('loginPostAdmin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware('auth:web')->group(function () {
    // Dashboard admin
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard.index');
    // Dashboard umum


    //Beasiswa Manajemen
    Route::get('beasiswa-list', [BeasiswaController::class, 'index'])->name('beasiswa-list');
    Route::get('beasiswa-create', [BeasiswaController::class, 'create'])->name('beasiswa-create');
    Route::post('beasiswa-store', [BeasiswaController::class, 'store'])->name('beasiswa-store');
    Route::get('beasiswa-edit/{id}', [BeasiswaController::class, 'edit'])->name('beasiswa-edit');
    Route::post('beasiswa-update/{id}', [BeasiswaController::class, 'update'])->name('beasiswa-update');
    Route::get('beasiswa-destroy/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa-destroy');

    // Category Prestasi Manajemen
    Route::get('category-list', [CategoryController::class, 'index'])->name('category-list');
    Route::get('category-create', [CategoryController::class, 'create'])->name('category-create');
    Route::post('category-store', [CategoryController::class, 'store'])->name('category-store');
    Route::get('category-edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::post('category-update/{id}', [CategoryController::class, 'update'])->name('category-update');
    Route::get('category-destroy/{id}', [CategoryController::class, 'destroy'])->name('category-destroy');

    // Prestasi Individu Manajemen
    Route::get('prestasi-individu-list', [PrestasiIndividuController::class, 'index'])->name('prestasi-individu-list');
    Route::get('prestasi-individu-create', [PrestasiIndividuController::class, 'create'])->name('prestasi-individu-create');
    Route::post('prestasi-individu-store', [PrestasiIndividuController::class, 'store'])->name('prestasi-individu-store');
    Route::get('prestasi-individu-edit/{id}', [PrestasiIndividuController::class, 'edit'])->name('prestasi-individu-edit');
    Route::post('prestasi-individu-update/{id}', [PrestasiIndividuController::class, 'update'])->name('prestasi-individu-update');
    Route::get('prestasi-individu-destroy/{id}', [PrestasiIndividuController::class, 'destroy'])->name('prestasi-individu-destroy');

    // Prestasi Tim Manajemen
    Route::get('prestasi-tim-list', [PrestasiTimController::class, 'index'])->name('prestasi-tim-list');
    Route::get('prestasi-tim-create', [PrestasiTimController::class, 'create'])->name('prestasi-tim-create');
    Route::post('prestasi-tim-store', [PrestasiTimController::class, 'store'])->name('prestasi-tim-store');
    Route::get('prestasi-tim-edit/{id}', [PrestasiTimController::class, 'edit'])->name('prestasi-tim-edit');
    Route::post('prestasi-tim-update/{id}', [PrestasiTimController::class, 'update'])->name('prestasi-tim-update');
    Route::get('prestasi-tim-destroy/{id}', [PrestasiTimController::class, 'destroy'])->name('prestasi-tim-destroy');

    //UKM Manajemen
    Route::get('prestasi-list', [RekapPrestasiController::class, 'index'])->name('prestasi-list');


    // Organisasi UKM Manajemen
    Route::get('ukm-list', [UkmController::class, 'index'])->name('ukm-list');
    Route::get('ukm-create', [UkmController::class, 'create'])->name('ukm-create');
    Route::post('ukm-store', [UkmController::class, 'store'])->name('ukm-store');
    Route::get('ukm-edit/{id}', [UkmController::class, 'edit'])->name('ukm-edit');
    Route::post('ukm-update/{id}', [UkmController::class, 'update'])->name('ukm-update');
    Route::get('ukm-destroy/{id}', [UkmController::class, 'destroy'])->name('ukm-destroy');

    //Organisasi BKM Manajemmen
    Route::get('bkm-list', [BkmController::class, 'index'])->name('bkm-list');
    Route::get('bkm-create', [BkmController::class, 'create'])->name('bkm-create');
    Route::post('bkm-store', [BkmController::class, 'store'])->name('bkm-store');
    Route::get('bkm-edit/{id}', [BkmController::class, 'edit'])->name('bkm-edit');
    Route::post('bkm-update/{id}', [BkmController::class, 'update'])->name('bkm-update');
    Route::get('bkm-destroy/{id}', [BkmController::class, 'destroy'])->name('bkm-destroy');
    //Sturktur Organisasi BKM Manajemen
    Route::get('struktur-bkm-list', [StrukturBkmController::class, 'index'])->name('struktur-bkm-list');
    Route::get('struktur-bkm-create', [StrukturBkmController::class, 'create'])->name('struktur-bkm-create');
    Route::post('struktur-bkm-store', [StrukturBkmController::class, 'store'])->name('struktur-bkm-store');
    Route::get('struktur-bkm-edit/{id}', [StrukturBkmController::class, 'edit'])->name('struktur-bkm-edit');
    Route::post('struktur-bkm-update/{id}', [StrukturBkmController::class, 'update'])->name('struktur-bkm-update');
    Route::get('struktur-bkm-destroy/{id}', [StrukturBkmController::class, 'destroy'])->name('struktur-bkm-destroy');

    Route::get('berita-list', [BeritaController::class, 'index'])->name('berita-list');
    Route::get('berita-create', [BeritaController::class, 'create'])->name('berita-create');
    Route::post('berita-store', [BeritaController::class, 'store'])->name('berita-store');
    Route::get('berita-edit/{id}', [BeritaController::class, 'edit'])->name('berita-edit');
    Route::post('berita-update/{id}', [BeritaController::class, 'update'])->name('berita-update');
    Route::get('berita-destroy/{id}', [BeritaController::class, 'destroy'])->name('berita-destroy');

    Route::get('hima-list', [HimaController::class, 'index'])->name('hima-list');
    Route::get('hima-create', [HimaController::class, 'create'])->name('hima-create');
    Route::post('hima-store', [HimaController::class, 'store'])->name('hima-store');
    Route::get('hima-edit/{id}', [HimaController::class, 'edit'])->name('hima-edit');
    Route::post('hima-update/{id}', [HimaController::class, 'update'])->name('hima-update');
    Route::get('hima-destroy/{id}', [HimaController::class, 'destroy'])->name('hima-destroy');

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
});
