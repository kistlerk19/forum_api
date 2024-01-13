<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// www.soc_media.test

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get("hello", [TestController::class,"index"]);
// Route::post("hello", [TestController::class,"create"]);

// Authentication Routes

Route::group([
    "prefix"=> "/v1/users",
    "middleware"=> "api",
], function () {
    Route::post("register", [AuthController::class,"register"]);
    Route::post("login", [AuthController::class, "login"]);
    Route::post('activatemail/{code}', [AuthController::class, 'activateEmail']);

    Route::post('forgot_password', [AuthController::class, 'resetPass']);
    Route::post('forgot_password/{token}', [AuthController::class, 'resetPasswordToken']);

    Route::group([
        "middleware" => "auth:api",
    ], function () {
        //@todo password reset
    });
});

// User Routes

Route::group([
    "middleware" => "auth:api",
    "prefix" => "/v1/user",
], function () {
    Route::get("me", [UserController::class,"me"]);
    Route::post("status/new", [StatusController::class,"store"]);
    Route::post("image-upload", [UserFileController::class,"store"]);
    Route::get("friend/{id}", [UserController::class, "toggleFriend"]);
    Route::get("friends", [UserController::class, "getFriends"]);
});