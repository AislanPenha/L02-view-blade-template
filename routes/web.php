<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/setSession', [MainController::class, 'setSession']);
Route::get('/clearSession', [MainController::class, 'clearSession']);
Route::post('/submit', [MainController::class, 'submitForm'])->name('submit');
Route::get('/page3', [MainController::class, 'showView']);
Route::get('/diretivas', [MainController::class, 'diretivas']);
