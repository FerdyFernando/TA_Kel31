<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\pasienController;
use App\Http\Controllers\janji_temuController;


Route::get('/dokter', [pasienController::class, 'index'])->name('dokter.index');
Route::get('/dokter/add', [dokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter/store', [dokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/edit/{id}', [dokterController::class, 'edit'])->name('dokter.edit');
Route::post('/dokter/update/{id}', [dokterController::class, 'update'])->name('dokter.update');
Route::post('/dokter/delete/{id}', [dokterController::class, 'delete'])->name('dokter.delete');

Route::get('/janji_temu', [janji_temuController::class, 'index'])->name('janji_temu.index');
Route::get('/janji_temu/add', [janji_temuController::class, 'create'])->name('janji_temu.create');
Route::post('/janji_temu/store', [janji_temuController::class, 'store'])->name('janji_temu.store');
Route::get('/janji_temu/edit/{id}', [janji_temuController::class, 'edit'])->name('janji_temu.edit');
Route::post('/janji_temu/update/{id}', [janji_temuController::class, 'update'])->name('janji_temu.update');
Route::post('/janji_temu/delete/{id}', [janji_temuController::class, 'delete'])->name('janji_temu.delete');

Route::get('/pasien', [pasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/add', [pasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien/store', [pasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/edit/{id}', [pasienController::class, 'edit'])->name('pasien.edit');
Route::post('/pasien/update/{id}', [pasienController::class, 'update'])->name('pasien.update');
Route::post('/pasien/delete/{id}', [pasienController::class, 'delete'])->name('pasien.delete');


Route::get('/', [dokterController::class, 'index'])->name('dokter.index');