<?php

use App\Http\Controllers\NumbersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/submit-numbers', [NumbersController::class, 'submitNumbers'])->name('submit-numbers');
