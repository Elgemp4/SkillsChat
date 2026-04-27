<?php

use App\Http\Controllers\ApiChatController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\ApiAuthController::class)->group(function () {
   Route::post('/login', "login");
   Route::middleware('auth:sanctum')->group(function () {
        Route::delete('/logout', "logout");
   });
});

Route::middleware("auth:sanctum")->group(function () {
    Route::apiResource("chat", ApiChatController::class);
});
