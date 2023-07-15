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


// Route::get('beasiswa', [BeasiswaController::class, 'frontBeasiswa'])->name('beasiswa');
Route::get('/beasiswa', function () {
    $data['page_title'] = "Beasiswa";
    $data['beasiswa'] = [];

    return view('frontend.beasiswa.index', $data);
})->name('beasiswa');


Route::get('beasiswa/{id}', [BeasiswaController::class, 'show'])->name('detail-beasiswa');

// Route::get('organisasi-ukm', [OrganisasiUkmController::class, 'frontUkm'])->name('organisasi-ukm');
Route::get('/organisasi-ukm', function () {
    $data['page_title'] = "UKM";
    $data['ukm'] = [];

    return view('frontend.organisasi.ukm', $data);
})->name('organisasi-ukm');

// Route::get('organisasi-bkm', [BkmController::class, 'frontBem'])->name('organisasi-bem');
Route::get('/organisasi-bkm', function () {
    $data['page_title'] = "BKM";
    $data['bkm'] = [];

    return view('frontend.organisasi.bkm', $data);
})->name('organisasi-bkm');

// Route::get('organisasi-hima', [HimaController::class, 'frontBem'])->name('organisasi-hima');
Route::get('/organisasi-hima', function () {
    $data['page_title'] = "HIMA";
    $data['hima'] = [];

    return view('frontend.organisasi.hima', $data);
})->name('organisasi-hima');

Route::get('/pkm', function () {
    $data['page_title'] = "PKM";
    $data['pkm'] = [];

    return view('frontend.simbelmawa.pkm', $data);
})->name('pkm');

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

    
});

