<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\ResumeController::class, 'CV']);
Route::post('/contact', [App\Http\Controllers\SendEmailController::class, 'contact']);
Route::get('/share/{token}', [App\Http\Controllers\ResumeController::class, 'ShareCV']);
Route::get('/PDF/{token?}', [App\Http\Controllers\ResumeController::class, 'PDFShareCV']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

