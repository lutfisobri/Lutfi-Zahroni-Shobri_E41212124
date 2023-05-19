<?php

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

Route::get('/', fn() => view('welcome'))->middleware('auth');

Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', fn() => view('register'))->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
// Route::post('/register', dd(request()->all()));
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Route::get('/dashboard', fn() => view('index'))->middleware('auth')->name('dashboard');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/trash/restore/{id}', [\App\Http\Controllers\TrashController::class, 'restore'])->middleware('auth')->name('trash.restore');
Route::get('/trash/delete/{id}', [\App\Http\Controllers\TrashController::class, 'delete'])->middleware('auth')->name('trash.delete');
Route::get('/trash/add', [\App\Http\Controllers\TrashController::class, 'add'])->middleware('auth')->name('trash.create');
// view
Route::get('/trash/{id}', [\App\Http\Controllers\TrashController::class, 'get'])->middleware('auth')->name('trash.get');