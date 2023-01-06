<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function (){
    return view('index');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
    Route::get('/register', [RegisterController::class, 'createStudent'])->name('registerStudent');
    Route::post('/storeStudent', [RegisterController::class, 'storeStudent'])->name('storeStudent');
    Route::get('/pdf/{nisn}', [RegisterController::class, 'pdfStudent'])->name('pdf');

});
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('user')->prefix('dashboard')->group(function(){
        Route::get('/payment', [StudentController::class, 'payment'])->name('payment');
        Route::post('/storePayment', [StudentController::class, 'storePayment'])->name('storePayment');
    });

    Route::middleware('admin')->prefix('dashboard')->group(function(){
    });
});
