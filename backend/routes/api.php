<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(\App\Http\Controllers\AuthAdminController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

Route::controller(\App\Http\Controllers\ContactUsController::class)->group(function () {
    Route::post('/contacts', 'store');
    Route::get('/contacts', 'index')->middleware('auth:sanctum');
    Route::get('/contacts/{contactUs}', 'show')
        ->where('contactUs', '[0-9]+')
        ->middleware("auth:sanctum")
        ->missing(function (Request $request) {
            return response()->json([
                'message' => 'Contact Us message not found',
                'data' => []
            ], 404);
        });;
    Route::patch('/contacts/{contactUs}', 'update_is_read')
        ->where('contactUs', '[0-9]+')
        ->middleware("auth:sanctum")
        ->missing(function (Request $request) {
            return response()->json([
                'message' => 'Contact Us message not found',
                'data' => []
            ], 404);
        });
});
