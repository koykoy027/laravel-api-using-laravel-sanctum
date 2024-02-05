<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::get('/students', 'index');
        Route::get('/students/{id}', 'show');
        Route::post('/students', 'store');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/{id}', 'show');
    });
});




Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register')->middleware('auth:sanctum');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
