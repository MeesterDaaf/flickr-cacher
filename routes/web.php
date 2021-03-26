<?php

use App\Http\Controllers\uploadController;
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


Route::get('/', [UploadController::class, 'index'])->name('home');
Route::get('show/{image}', [UploadController::class, 'show'])->name('show');
Route::get('upload', [UploadController::class, 'create'])->name('upload.create');
Route::post('upload', [UploadController::class, 'store'])->name('upload.store');
