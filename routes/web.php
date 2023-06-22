<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenyewaController;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('only_guest')->group(function() {
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'proses_login']);
    Route::get('/register',[AuthController::class, 'register']);
    Route::post('/register',[AuthController::class, 'proses_register']);
});


Route::middleware('auth')->group(function() {
    Route::get('/admin',[AdminController::class, 'dashboard'])->middleware('only_admin');
    Route::get('/penyewa',[PenyewaController::class, 'dashboard'])->middleware('only_penyewa');
    Route::get('/home',[HomeController::class, 'index']);
    Route::get('/logout',[AuthController::class, 'logout']);
});
