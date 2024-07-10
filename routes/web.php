<?php

use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('kalkulator.kalkulator');
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



Route::get('/accrequestKampanye', function () {
    return view('kampanye.AccrequestKampanye');
});

Route::get('/detailkampanye', function () {
    return view('kampanye.detailkampanye');
});

Route::get('/dashboardadmin', function () {
    return view('admin.dashboardadmin');
});

Route::get('/kelolakampanye', function () {
    return view('kampanye.kelolakampanye');
});

Route::get('/kelolaartikel', function () {
    return view('artikel.kelolaartikel');
});

Route::get('/uploadartikel', function () {
    return view('artikel.uploadartikel');
});




// Route::prefix('/profiladmin')->group(function () {
//     Route::get('/gantiemail/{id}', function ($id) {
//         return view('admin.gantiganti.gantiemail');
//     });

//     Route::get('/gantinama/{id}', function ($id) {
//         return view('admin.gantiganti.gantinama');
//     });

//     Route::get('/gantitelp/{id}', function ($id) {
//         return view('admin.gantiganti.gantitelp');
//     });

//     Route::get('/gantialamat/{id}', function ($id) {
//         return view('admin.gantiganti.gantialamat');
//     });


//     Route::get('/gantiTL/{id}', function ($id) {
//         return view('admin.gantiganti.gantiTL');
//     });

//     Route::get('/gantiprofile/{id}', function ($id) {
//         return view('admin.gantiganti.gantiprofile');
//     });

//     Route::get('/gantikodepos/{id}', function ($id) {
//         return view('admin.gantiganti.gantikodepos');
//     });

//     Route::get('/gantigender/{id}', function ($id) {
//         return view('admin.gantiganti.gantigender');
//     });

//     Route::get('/gantisandi/{id}', function ($id) {
//         return view('admin.gantiganti.gantisandi');
//     });
// });

//Kalkulator
Route::get('/kalkulator/{jenis}/', [KalkulatorController::class, 'items'])->name('kalkulator.index');

Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator.list');

Route::post('/kalkulator/result/', [KalkulatorController::class, 'result'])->name('kalkulator.result');