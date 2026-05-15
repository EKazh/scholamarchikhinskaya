<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('api')->group(function () {
    Route::post('/user-preferences', [App\Http\Controllers\UserPreferenceController::class, 'store']);
    Route::get('/user-preferences', [App\Http\Controllers\UserPreferenceController::class, 'get']);
});
