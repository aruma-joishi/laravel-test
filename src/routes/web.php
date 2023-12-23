<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CsvDownloadController;

//問い合わせ
Route::get('/', [ContactController::class,'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);

//ログイン、アカウント作成
Route::middleware('auth')->group(function () {
  Route::get('/admin', [AdminController::class, 'index']);
});


//管理画面
Route::delete('/admin/delete', [AdminController::class, 'destroy']);
Route::get('/admin/search', [AdminController::class, 'search']);
Route::get('/admin/csv-download', [CsvDownloadController::class, 'downloadCsv']);