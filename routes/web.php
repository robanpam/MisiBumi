<?php

use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('kalkulator.kalkulator');
});


Route::get('/profiladmin/{id}', [AdminController::class, 'admin'])->name('profileadmin');

Route::get('/profiladmin/gantinama/{id}', [AdminController::class, 'gantinama'])->name('gantinama');


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




Route::prefix('/profiladmin')->group(function () {
    Route::get('/gantiemail/{id}', function ($id) {
        return view('admin.gantiganti.gantiemail');
    });

    Route::get('/gantinama/{id}', function ($id) {
        return view('admin.gantiganti.gantinama');
    });

    Route::get('/gantitelp/{id}', function ($id) {
        return view('admin.gantiganti.gantitelp');
    });

    Route::get('/gantialamat/{id}', function ($id) {
        return view('admin.gantiganti.gantialamat');
    });


    Route::get('/gantiTL/{id}', function ($id) {
        return view('admin.gantiganti.gantiTL');
    });

    Route::get('/gantiprofile/{id}', function ($id) {
        return view('admin.gantiganti.gantiprofile');
    });

    Route::get('/gantikodepos/{id}', function ($id) {
        return view('admin.gantiganti.gantikodepos');
    });

    Route::get('/gantigender/{id}', function ($id) {
        return view('admin.gantiganti.gantigender');
    });

    Route::get('/gantisandi/{id}', function ($id) {
        return view('admin.gantiganti.gantisandi');
    });
});

//Kalkulator
Route::get('/kalkulator/{jenis}/', [KalkulatorController::class, 'items'])->name('kalkulator.index');
