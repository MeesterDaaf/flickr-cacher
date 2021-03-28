<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [ImageController::class, 'index'])->name('home');
Route::get('show/{image}', [ImageController::class, 'show'])->name('show');
Route::get('upload', [ImageController::class, 'create'])->name('upload.create');
Route::post('upload', [ImageController::class, 'store'])->name('upload.store');
