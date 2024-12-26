<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function() {

    Route::prefix('event')->controller(EventController::class)->group(function() {
        Route::post('/', 'store');
        Route::get('/', 'index');
    });

});