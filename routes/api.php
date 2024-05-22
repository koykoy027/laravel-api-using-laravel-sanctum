<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\GlobalParameter\GlobalParameterController;
use App\Http\Controllers\GlobalParameter\GlobalParameterTypeController;
use App\Http\Controllers\User\UserController;
use App\Http\Resources\UserResource;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// authenticated
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user_profile = UserProfile::find(Auth::user()->id);
    return new UserResource($user_profile);
});

// token required
Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/{id}', 'show');
        Route::patch('/users/{id}', 'update');
    });    
    
});



// token not required

Route::controller(GlobalParameterTypeController::class)->group(function () {
    Route::get('/global parameter type', 'index');
    Route::post('/global parameter type', 'store')->middleware('auth:sanctum');
    // Route::patch('/global parameter type/{id}', 'update');
});

Route::controller(GlobalParameterController::class)->group(function () {
    Route::post('/global parameter', 'store')->middleware('auth:sanctum');
    Route::patch('/global parameter/{id}', 'update')->middleware('auth:sanctum');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register')->middleware('auth:sanctum');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
