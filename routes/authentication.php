<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/token/create', [AuthController::class, 'createToken'])->middleware('role:superadmin');
})->middleware('auth:sanctum');
