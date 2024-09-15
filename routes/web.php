<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;

Route::get('/', function () {
    return view('level.index');
});


Route::prefix('level')->name('level.')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::delete('/reset', [LevelController::class, 'reset']);
    Route::post('/store', [LevelController::class, 'store']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}/update', [LevelController::class, 'update']);
    Route::get('/{id}/delete', [LevelController::class, 'confirm']);
    Route::delete('/{id}/delete', [LevelController::class, 'delete']);
});