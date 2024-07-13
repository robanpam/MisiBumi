<?php

use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KampanyeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('kampanye.detailKampanye');
});

//profile admin
Route::get('/profiladmin/{id}', [AdminController::class, 'admin'])->name('profileadmin');


//ganti nama
Route::get('/profiladmin/gantinama/{id}', [AdminController::class, 'gantinama'])->name('gantinama');
Route::post('/profiladmin/gantinama/{id}', [AdminController::class, 'updateNama'])->name('updateNama');

//ganti password
Route::get('/profiladmin/ubahkatasandi/{id}', [AdminController::class, 'showChangePasswordForm'])->name('ubahkatasandi');
Route::post('/profiladmin/ubahkatasandi/{id}', [AdminController::class, 'updatePassword'])->name('updatePassword');

//ganti email
Route::get('/profiladmin/ubahemail/{id}', [AdminController::class, 'showChangeEmailForm'])->name('ubahemail');
Route::post('/profiladmin/ubahemail/{id}', [AdminController::class, 'updateEmail'])->name('updateEmail');

//ganti telp
Route::get('/profiladmin/ubahnomortelpon/{id}', [AdminController::class, 'showChangeTelponForm'])->name('ubahnomortelpon');
Route::post('/profiladmin/ubahnomortelpon/{id}', [AdminController::class, 'updateTelpon'])->name('updateTelpon');


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



// kelola kampanye
Route::get('/kelolakampanye', [KampanyeController::class, 'index'])->name('kelolakampanye');

//request kampanye
Route::get('/accrequestkampanye', [KampanyeController::class, 'fetchPendingKampanyes'])->name('fetchPendingKampanyes');

//detail kampanye
Route::get('/detailkampanye/{id}', [KampanyeController::class, 'show'])->name('detailkampanye');
Route::post('/terima/{id}', [KampanyeController::class, 'terima'])->name('terima');
Route::post('/tolak/{id}', [KampanyeController::class, 'tolak'])->name('tolak');


// Route::get('/dashboardadmin', function () {
//     return view('admin.dashboardadmin');
// });




Route::get('/kampanye', function () {
    return view('kampanye.mainKampanye');
});

Route::get('/detail', function () {
    return view('kampanye.detailKampanye2');
});

Route::get('/donasi', function () {
    return view('donasi.mainDampakDonasi');
});

Route::get('/laporan', function () {
    return view('laporan.laporanTahunan');
});


//Kalkulator
Route::get('/kalkulator/{jenis}/', [KalkulatorController::class, 'items'])->name('kalkulator.index');

Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator.list');

Route::post('/kalkulator/result/', [KalkulatorController::class, 'result'])->name('kalkulator.result');
