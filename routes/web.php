<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\SuratmasukController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk SuratmasukController
Route::get('/surat', [SuratmasukController::class, 'index'])->name('surat');
Route::get('/tambahsurat', [SuratmasukController::class, 'tambahsurat'])->name('tambahsurat');
Route::post('/insertdata', [SuratmasukController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [SuratmasukController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [SuratmasukController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}', [SuratmasukController::class, 'delete'])->name('delete');

// Routes untuk halaman tambahan pelaporan dan validasi
Route::get('/pelaporan', [PageController::class, 'pelaporan'])->name('pelaporan');

Route::get('/letters', [LetterController::class, 'index'])->name('index');
Route::post('/letters/{id}/validate-operator', [LetterController::class, 'validateByOperator'])->name('letters.validate.operator');
Route::post('/letters/{id}/note', [LetterController::class, 'addNote'])->name('letters.note');
Route::get('/letters/secretary', [LetterController::class, 'secretaryIndex'])->name('letters.secretary');
Route::post('/letters/{id}/validate/secretary', [LetterController::class, 'validateBySecretary'])->name('letters.validate.secretary');
Route::get('/letters/chief', [LetterController::class, 'chiefIndex'])->name('letters.chief');
Route::post('/letters/{letter}/validate-chief', [App\Http\Controllers\LetterController::class, 'validateByChief'])->name('letters.validate.chief');


