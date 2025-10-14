<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MessageController::class, 'index'])->name('index');
Route::post('/messages', [\App\Http\Controllers\MessageController::class, 'store']);
Route::get('/messages/{message}/edit', [\App\Http\Controllers\MessageController::class, 'edit']);
Route::put('/messages/{message}', [\App\Http\Controllers\MessageController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}', [\App\Http\Controllers\MessageController::class, 'destroy']);
