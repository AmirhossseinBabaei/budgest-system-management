<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('sanctum/register', [\App\Http\Controllers\Api\v1\Authentication\SanctumController::class, 'registerUser'])->name('sanctum.register');
Route::post('sanctum/login', [\App\Http\Controllers\Api\v1\Authentication\SanctumController::class, 'LoginUser'])->name('sanctum.login');


