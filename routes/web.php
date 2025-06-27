<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ImportController;
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

    // halaman data user
    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::get('/create_user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store_user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update_user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/delete_user/{id}', [UserController::class, 'delete'])->name('user.delete');

    // halaman data rumah
    Route::get('/rumah', [RumahController::class, 'rumah'])->name('rumah');
    Route::get('/create_rumah', [RumahController::class, 'create'])->name('rumah.create');
    Route::post('/store_rumah', [RumahController::class, 'store'])->name('rumah.store');
    Route::get('/edit_rumah/{id}', [RumahController::class, 'edit'])->name('rumah.edit');
    Route::put('/update_rumah/{id}', [RumahController::class, 'update'])->name('rumah.update');
    Route::get('/delete_rumah/{id}', [RumahController::class, 'delete'])->name('rumah.delete');

    // halaman data mobil
    Route::get('/mobil', [MobilController::class, 'mobil'])->name('mobil');
    Route::get('/create_mobil', [MobilController::class, 'create'])->name('mobil.create');
    Route::post('/store_mobil', [MobilController::class, 'store'])->name('mobil.store');
    Route::get('/edit_mobil/{id}', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::put('/update_mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
    Route::get('/delete_mobil/{id}', [MobilController::class, 'delete'])->name('mobil.delete');

    // halaman import excel
    Route::get('/importexcel', [ImportController::class, 'importExcel'])->name('import-excel');
    Route::get('/importexcelmulti', [ImportController::class, 'importExcelMulti'])->name('import-excel-multisheet');
    Route::post('/import-proses-single', [ImportController::class, 'importProsesSingle'])->name('import-proses-single');
    Route::post('/import-proses-multi', [ImportController::class, 'importProsesMulti'])->name('import-proses-multi');

    // halaman datatable
    Route::get('/client', [DatatableController::class, 'clientSide'])->name('clientside');
    Route::get('/server', [DatatableController::class, 'serverSide'])->name('serverside');
});
