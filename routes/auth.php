<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/api/v1')->group(function(){

    Route::post('sanctum/register', [\App\Http\Controllers\Api\v1\Authentication\SanctumController::class, 'registerUser'])->name('sanctum.register');
    Route::post('sanctum/login', [\App\Http\Controllers\Api\v1\Authentication\SanctumController::class, 'LoginUser'])->name('sanctum.login');

})
    ->name('api.v1');
