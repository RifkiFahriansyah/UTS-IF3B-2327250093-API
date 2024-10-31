<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBarangController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/warehouse', [DataBarangController::class, 'index']);
Route::post('/warehouse', [DataBarangController::class, 'store']);
