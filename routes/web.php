<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    return redirect()->route("profile.show");
});


Route::middleware("auth")->group(function () {
    Route::singleton("profile", \App\Http\Controllers\ProfileController::class)->only("show", "update");
    Route::resource("user", \App\Http\Controllers\UserController::class);
    Route::singleton("settings", \App\Http\Controllers\WebsiteSettingController::class)->only("show", "update");
    Route::controller(ChatController::class)->name("chat.")->group(function () {
        Route::get("chat/{user}", "indexs")->name("indexs");
        Route::get("chat/{user}/{chat}", "shows")->name("shows");
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get("login", "showLogin")->name("login");
    Route::post("login", "login")->name("login");
    Route::middleware("auth")->group(function () {
        Route::delete("logout", "logout")->name("logout");
    });
});


