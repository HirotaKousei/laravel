<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

Route::post('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
