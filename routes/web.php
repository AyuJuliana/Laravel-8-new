<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratmasukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/surat', [SuratmasukController::class, 'index'])->name('surat');

Route::get('/tambahsurat', [SuratmasukController::class, 'tambahsurat'])->name('tambahsurat');

Route::post('/insertdata', [SuratmasukController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [SuratmasukController::class, 'tampilkandata'])->name('tampilkandata');

Route::post('/updatedata/{id}', [SuratmasukController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [SuratmasukController::class, 'delete'])->name('delete');