<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\GlobalParameter\GlobalParameterController;
use App\Http\Controllers\Api\GlobalParameter\GlobalParameterTypeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// token required
Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/{user}', 'show');
    });
});

// token not required
Route::controller(GlobalParameterTypeController::class)->group(function () {
    Route::get('/global parameter type', 'index');
});

Route::controller(GlobalParameterController::class)->group(function () {
    Route::get('/global parameter', 'index');
});




Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register')->middleware('auth:sanctum');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
