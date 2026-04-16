<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    return redirect()->route("profile.show");
});


Route::middleware("auth")->group(function () {
    Route::singleton("profile", \App\Http\Controllers\ProfileController::class);
    Route::resource("user", \App\Http\Controllers\UserController::class);
    Route::singleton("settings", \App\Http\Controllers\WebsiteSettingController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::get("login", "showLogin")->name("login");
    Route::post("login", "login")->name("login");
});


