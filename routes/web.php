<?php

use Illuminate\Support\Facades\Route;

Route::view('/welcome', 'welcome');

Route::middleware('auth')->group(function (){
    Route::get('/', [App\Http\Controllers\MessageController::class, 'index'])->name('index');
    Route::post('/messages', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{message}/edit', [\App\Http\Controllers\MessageController::class, 'edit'])->name('messages.edit');
    Route::put('/messages/{message}', [\App\Http\Controllers\MessageController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{message}', [\App\Http\Controllers\MessageController::class, 'destroy'])->name('messages.delete');
});



//registration
Route::view('/register', 'auth.register');
Route::post('/register', \App\Http\Controllers\Auth\Register::class)
    ->middleware('guest')
    ->name('register');

//login
Route::view('/login', 'auth.login');
Route::post('/login', \App\Http\Controllers\Auth\Login::class)
    ->middleware('guest')
    ->name('login');

//logout
Route::post('/logout', \App\Http\Controllers\Auth\Logout::class)
    ->middleware('auth')
    ->name('logout');
