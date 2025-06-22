<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_proses', [LoginController::class, 'proses_login'])->name('login.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisController::class, 'register'])->name('register');
Route::post('/regis_proses', [RegisController::class, 'proses_regis'])->name('regis.proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/', [BerandaController::class, 'dashboard'])->name('dashboard');

    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/client', [DatatableController::class, 'clientSide'])->name('clientside');
    Route::get('/server', [DatatableController::class, 'serverSide'])->name('serverside');
});
