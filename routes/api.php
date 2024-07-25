<?php

use App\Http\Controllers\DonasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/midtrans-callback', [DonasiController::class, 'callback']);