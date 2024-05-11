<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/* 
Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum'); 
*/

Route::post('/login', [LoginController::class, 'authenticate']);

Route::controller(ProjectController::class)->prefix('cms')->group(function () {
    Route::get('/project', 'index');
    Route::post('/project', 'store');
    Route::get('/project/{id}', 'show');
    Route::put('/project/{id}', 'update');
    Route::delete('/project/{id}', 'destroy');

});


