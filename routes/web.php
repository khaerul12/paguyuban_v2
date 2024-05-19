<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class,'detail'])->name('detail');

Route::get('/landingpage', [HomeController::class,'landingpage'])->name('landingpage');
Route::get('/allActivity', [HomeController::class,'allActivity'])->name('allActivity');

Route::get('/detailActivity/{id}', [HomeController::class, 'detailActivity'])->name('detailActivity');
