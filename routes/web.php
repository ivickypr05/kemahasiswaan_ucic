<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BkmController;
use App\Http\Controllers\CategoryPrestasiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HimaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PkmController;
use App\Http\Controllers\PpkController;
use App\Http\Controllers\PrestasiIndividuController;
use App\Http\Controllers\PrestasiTimController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\NonAkademikController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $data['page_title'] = "Home Kemahasiswaan";
    return view('frontend.home', $data);
})->name('home');


Route::get('beasiswa', [BeasiswaController::class, 'frontBeasiswa'])->name('beasiswa');
Route::get('beasiswa/{id}', [BeasiswaController::class, 'show'])->name('detail-beasiswa');

Route::get('/prestasi-individu', function () {
    $data['page_title'] = "Prestasi Individu";
    $data['prestasi-individu'] = [];

    return view('admin.prestasi.individu.index', $data);
})->name('prestasi-individu');

Route::get('/prestasi-tim', function () {
    $data['page_title'] = "Prestasi Tim";
    $data['prestasi-tim'] = [];

    return view('admin.prestasi.tim.index', $data);
})->name('prestasi-tim');

Route::get('/prestasi-individu', function () {
    $data['page_title'] = "Prestasi Individu";
    $data['prestasi-individu'] = [];

    return view('frontend.prestasi.individu', $data);
})->name('prestasi-individu');

Route::get('/prestasi-tim', function () {
    $data['page_title'] = "Prestasi Tim";
    $data['prestasi-tim'] = [];

    return view('frontend.prestasi.tim', $data);
})->name('prestasi-tim');

Route::get('/category', function () {
    $data['page_title'] = "Category";
    $data['category'] = [];

    return view('admin.prestasi.category.index', $data);
})->name('category');



Route::get('organisasi-ukm', [UkmController::class, 'frontUkm'])->name('organisasi-ukm');
Route::get('organisasi-ukm/{id}', [UkmController::class, 'show'])->name('detail-ukm');

Route::get('organisasi-bkm', [BkmController::class, 'frontBkm'])->name('organisasi-bkm');
Route::get('organisasi-bkm/{id}', [BkmController::class, 'show'])->name('detail-bkm');

Route::get('organisasi-hima', [HimaController::class, 'frontHima'])->name('organisasi-hima');
Route::get('organisasi-hima/{id}', [HimaController::class, 'show'])->name('detail-hima');

Route::get('pkm', [PkmController::class, 'frontPkm'])->name('pkm');
Route::get('pkm/{id}', [PkmController::class, 'show'])->name('detail-pkm');

Route::get('/ppk', function () {
    $data['page_title'] = "PPK";
    $data['ppk'] = [];

    return view('frontend.simbelmawa.ppk', $data);
})->name('ppk');

// Route::get('berita', [BeritaController::class, 'show'])->name('berita');
Route::get('/berita', function () {
    $data['page_title'] = "Berita";
    $data['berita'] = [];

    return view('frontend.berita.berita', $data);
})->name('berita');

Route::get('detail-berita/{id}', [BeritaController::class, 'show'])->name('detail-berita');

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('send-mail', [ContactController::class, 'sendMail'])->name('send-mail');


// admmin

Route::get('login-admin', function () {
    $data['page_title'] = "Login Admin";
    return view('admin.auth.login', $data);
})->name('login-admin');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('loginPost2', [UserController::class, 'loginPost2'])->name('loginPost2');
Route::post('loginPostAdmin', [UserController::class, 'loginPostAdmin'])->name('loginPostAdmin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware('auth:web')->group(function () {
    // Dashboard admin
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard.index');
    // Dashboard umum

    Route::get('beasiswa-list', [BeasiswaController::class, 'index'])->name('beasiswa-list');
    Route::get('beasiswa-create', [BeasiswaController::class, 'create'])->name('beasiswa-create');
    Route::post('beasiswa-store', [BeasiswaController::class, 'store'])->name('beasiswa-store');
    Route::get('beasiswa-edit/{id}', [BeasiswaController::class, 'edit'])->name('beasiswa-edit');
    Route::post('beasiswa-update/{id}', [BeasiswaController::class, 'update'])->name('beasiswa-update');
    Route::get('beasiswa-destroy/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa-destroy');

    Route::get('rekap-list', [RekapPrestasiController::class, 'index'])->name('rekap-list');

    Route::get('ukm-list', [UkmController::class, 'index'])->name('ukm-list');
    Route::get('ukm-create', [UkmController::class, 'create'])->name('ukm-create');
    Route::post('ukm-store', [UkmController::class, 'store'])->name('ukm-store');
    Route::get('ukm-edit/{id}', [UkmController::class, 'edit'])->name('ukm-edit');
    Route::post('ukm-update/{id}', [UkmController::class, 'update'])->name('ukm-update');
    Route::get('ukm-destroy/{id}', [UkmController::class, 'destroy'])->name('ukm-destroy');

    Route::get('bkm-list', [BkmController::class, 'index'])->name('bkm-list');
    Route::get('bkm-create', [BkmController::class, 'create'])->name('bkm-create');
    Route::post('bkm-store', [BkmController::class, 'store'])->name('bkm-store');
    Route::get('bkm-edit/{id}', [BkmController::class, 'edit'])->name('bkm-edit');
    Route::post('bkm-update/{id}', [BkmController::class, 'update'])->name('bkm-update');
    Route::get('bkm-destroy/{id}', [BkmController::class, 'destroy'])->name('bkm-destroy');

    Route::get('berita-list', [BeritaController::class, 'index'])->name('berita-list');

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

    Route::get('ppk-list', [PpkController::class, 'index'])->name('ppk-list');

    Route::get('akademik-list', [AkademikController::class, 'index'])->name('akademik-list');

    Route::get('nonakademik-list', [NonAkademikController::class, 'index'])->name('nonakademik-list');
    
});

