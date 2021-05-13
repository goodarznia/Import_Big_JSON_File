<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user_area')->middleware('auth')->group(function () {
    Route::resource('import', 'App\Http\Controllers\ImportController')->except(['update', 'edit', 'destroy']);
});
