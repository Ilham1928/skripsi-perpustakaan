<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/book', [BookController::class, 'index']);
    Route::get('/book/add', [BookController::class, 'add']);
    Route::post('/book/add', [BookController::class, 'create']);
    Route::get('/book/edit/{id}', [BookController::class, 'edit']);
    Route::post('/book/edit/{id}', [BookController::class, 'update']);
    Route::get('/book/delete/{id}', [BookController::class, 'delete']);
});
