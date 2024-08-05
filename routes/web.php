<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KampanyeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PohonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'landingPage'])->name('beranda.landingPage');

//kampanye
Route::get('/kampanye', [KampanyeController::class, 'index'])->name('mainKampanye');
Route::get('/blmSelesai', [KampanyeController::class, 'blmSelesai'])->name('kampanye.belum');
Route::get('/udhSelesai', [KampanyeController::class, 'udhSelesai'])->name('kampanye.sudah');

//User Kampanye
Route::get('/detailkampanye2/{id}', [KampanyeController::class, 'showDetailKampanye'])->name('detailkampanye2');

// Donasi
Route::get('/dampak', [DonasiController::class, 'mainDonasi'])->name('mainDonasi');

// Artikel
Route::get('/detailArtikel/{id}', [ArtikelController::class, 'detailArtikel'])->name('detailArtikel');

// Laporan
Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');

//Kalkulator
Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator.list');
Route::get('/kalkulator/{jenis}/', [KalkulatorController::class, 'items'])->name('kalkulator.index');
Route::post('/kalkulator/result/', [KalkulatorController::class, 'result'])->name('kalkulator.result');

//Login&Register
Route::get('/sign-register', [SessionController::class, 'init'])->name('session.init');
Route::post('/login', [SessionController::class, 'login'])->name('session.login');
Route::post('/regis', [SessionController::class, 'register'])->name('session.register');

//Password Reset
Route::get('/passwordreset', [SessionController::class, 'showPasswordResetRequestForm'])->name('password.request');
Route::post('/passwordresetlink', [SessionController::class, 'sendPasswordResetLink'])->name('password.email');
Route::get('/passwordreset/{token}', [SessionController::class, 'showPasswordResetFormWithToken'])->name('password.reset');
Route::post('/passwordreset', [SessionController::class, 'passwordReset'])->name('password.update');

//Beranda, Landing Page
Route::get('/beranda', [BerandaController::class, 'show'])->name('beranda.show');

//Send Request Kampanye
Route::get('/request/kampanye', [KampanyeController::class, 'sendRequest'])->name('kampanye.request');

//Pohon
Route::get('/pohon/{id}', [PohonController::class, 'show'])->name('pohon.show');

//Artikel
Route::get('/artikel', [ArtikelController::class, 'mainArtikel'])->name('mainArtikel');

// Leaderboard
Route::get('/leaderboard', [BerandaController::class, 'leaderboard'])->name('leaderboard');
Route::get('/profile/logout', [ProfileController::class, 'logout'])->name('profile.logout');

//Post Kampanye
Route::post('/add/kampanye', [KampanyeController::class, 'addRequest'])->name('kampanye.add');

Route::middleware(['user'])->group(function(){
    //Donasi
    Route::post('/donasi', [DonasiController::class, 'pilihNominal'])->name('donasi.pilihNominal');
    Route::post('/store', [DonasiController::class, 'store'])->name('donasi.store');
    Route::get('/detail/{donasi}', [DonasiController::class, 'show'])->name('donasi.show_detail');


    //Profile
    Route::get('/profile/history', [ProfileController::class, 'history'])->name('profile.history');
    Route::get('/profile/kampanye', [ProfileController::class, 'kampanye'])->name('profile.kampanye');
    Route::get('/profile/pengaturan', [ProfileController::class, 'pengaturan'])->name('profile.pengaturan');
    Route::post('/profile/updateFoto', [ProfileController::class, 'foto'])->name('profile.foto');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['admin'])->group(function(){
    //Admin kelola kampanye
    Route::get('/detailkampanye/{id}', [KampanyeController::class, 'showDetailRequestKampanye'])->name('detailkampanye');
    Route::post('/terima/{id}', [KampanyeController::class, 'terima'])->name('terima');
    Route::post('/tolak/{id}', [KampanyeController::class, 'tolak'])->name('tolak');
    Route::post('/terima-semua', [KampanyeController::class, 'terimaSemua'])->name('terimaSemua');
    Route::post('/tolak-semua', [KampanyeController::class, 'tolakSemua'])->name('tolakSemua');

    //Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'show'])->name('dashboard.show');

    //kelola kampanye
    Route::get('/kelolakampanye', [KampanyeController::class, 'kelola'])->name('kelolakampanye');

    //request kampanye
    Route::get('/accrequestkampanye', [KampanyeController::class, 'fetchPendingKampanyes'])->name('fetchPendingKampanyes');

    //profile admin
    Route::get('/profiladmin', [AdminController::class, 'admin'])->name('profileadmin');

    //ganti nama
    Route::get('/profiladmin/gantinama', [AdminController::class, 'gantinama'])->name('gantinama');
    Route::post('/profiladmin/gantinama', [AdminController::class, 'updateNama'])->name('updateNama');

    //ganti password
    Route::get('/profiladmin/ubahkatasandi', [AdminController::class, 'showChangePasswordForm'])->name('ubahkatasandi');
    Route::post('/profiladmin/ubahkatasandi', [AdminController::class, 'updatePassword'])->name('updatePassword');

    //ganti email
    Route::get('/profiladmin/ubahemail', [AdminController::class, 'showChangeEmailForm'])->name('ubahemail');
    Route::post('/profiladmin/ubahemail', [AdminController::class, 'updateEmail'])->name('updateEmail');

    //ganti telp
    Route::get('/profiladmin/ubahnomortelpon', [AdminController::class, 'showChangeTelponForm'])->name('ubahnomortelpon');
    Route::post('/profiladmin/ubahnomortelpon', [AdminController::class, 'updateTelpon'])->name('updateTelpon');

    //ganti profile
    Route::get('/gantiprofile', [AdminController::class, 'showUpdateProfileForm'])->name('showUpdateProfileForm');
    Route::post('/gantiprofile', [AdminController::class, 'updateProfilePicture'])->name('updateProfilePicture');

    //kelola artikel
    Route::get('/kelolaartikel', [ArtikelController::class, 'kelolaartikel'])->name('kelolaartikel');

    //upload artikel
    Route::get('/uploadartikel', [ArtikelController::class, 'showUploadForm'])->name('uploadartikel');
    Route::post('/uploadartikel', [ArtikelController::class, 'store'])->name('storeartikel');

    //edit artikel
    Route::get('/editartikel/{id}', [ArtikelController::class, 'edit'])->name('editartikel');
    Route::post('/updateartikel/{id}', [ArtikelController::class, 'update'])->name('updateartikel');

    //delete artikel
    Route::delete('/deleteartikel/{id}', [ArtikelController::class, 'destroy'])->name('deleteartikel');
});