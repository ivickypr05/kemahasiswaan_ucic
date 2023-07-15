<?php

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
    return view('front-end.home', $data);
})->name('home');


Route::get('beasiswa', [BeasiswaController::class, 'frontBeasiswa'])->name('beasiswa');
Route::get('beasiswa/{id}', [BeasiswaController::class, 'show'])->name('detail-beasiswa');

Route::get('organisasi-ukm', [OrganisasiUkmController::class, 'frontUkm'])->name('organisasi-ukm');
Route::get('organisasi-bem', [OrganisasiBemController::class, 'frontBem'])->name('organisasi-bem');

Route::get('kegiatan', [DaftarKegiatanController::class, 'frontKegiatan'])->name('kegiatan');
Route::get('detail-kegiatan/{id}', [DaftarKegiatanController::class, 'detailKegiatan'])->name('detail-kegiatan');

Route::get('pengumuman', [PengumumanController::class, 'frontPengumuman'])->name('pengumuman');
Route::get('detail-pengumuman/{id}', [PengumumanController::class, 'detailPengumuman'])->name('detail-pengumuman');

Route::get('contact', [ContactController::class, 'index'])->name('contact');