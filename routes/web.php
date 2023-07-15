<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\BkmController;
use App\Http\Controllers\CategoryPrestasiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HimaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PkmController;
use App\Http\Controllers\PpkController;
use App\Http\Controllers\PrestasiIndividuController;
use App\Http\Controllers\PrestasiTimController;
use App\Http\Controllers\UkmController;
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

Route::get('kegiatan', [DaftarKegiatanController::class, 'frontKegiatan'])->name('kegiatan');
Route::get('detail-kegiatan/{id}', [DaftarKegiatanController::class, 'detailKegiatan'])->name('detail-kegiatan');

Route::get('pengumuman', [PengumumanController::class, 'frontPengumuman'])->name('pengumuman');
Route::get('detail-pengumuman/{id}', [PengumumanController::class, 'detailPengumuman'])->name('detail-pengumuman');

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('send-mail', [ContactController::class, 'sendMail'])->name('send-mail');
