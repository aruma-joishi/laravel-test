<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class,'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);



//↓あとで消す
Route::get('/admin', [ContactController::class,'viewadmin']);
Route::get('/login', [ContactController::class,'viewlogin']);
Route::get('/register', [ContactController::class,'viewregister']);
Route::get('/thanks', [ContactController::class,'viewthanks']);
Route::get('/confirm', [ContactController::class,'viewconfirm']);
