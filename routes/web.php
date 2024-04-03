<?php

use App\Http\Controllers\request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']); 
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

// LoginController
Route::post('/process', [LoginController::class, 'process']) ->name('process'); 
Route::get('/login', [LoginController::class, 'index']) ->name('login'); 


Route::get('/register', [LoginController::class, 'create']) ->name('register'); 
Route::post('/register/process', [LoginController::class, 'store']) ->name('register.process'); 


Route::get('/forgot-password', [LoginController::class, 'forgotPassword']) ->name('forgot-password'); 
Route::post('/forgot-password/process', [LoginController::class, 'sendEmail']) ->name('forgot-password.process'); 

Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard'); 

Route::get('/daftar-konselor', [KonselorController::class, 'index'])->name('daftar-konselor.index');
Route::get('/daftar-konselor/tambah', [KonselorController::class, 'create'])->name('daftar-konselor.create');
Route::post('/daftar-konselor/tambah/proses', [KonselorController::class, 'store'])->name('daftar-konselor.store');

Route::get('/daftar-konselor/edit/{id}', [KonselorController::class, 'edit'])->name('daftar-konselor.edit');
Route::post('/daftar-konselor/edit/{id?}/proses', [KonselorController::class, 'update'])->name('daftar-konselor.update');

Route::get('/daftar-konselor/hapus/{id?}', [KonselorController::class, 'destroy'])->name('daftar-konselor.destroy');

Route::get('/daftar-pengguna', [PenggunaController::class, 'index'])->name('daftar-pengguna.index');

Route::get('/daftar-pengguna/tambah', [PenggunaController::class, 'create'])->name('daftar-pengguna.create');
Route::post('/daftar-pengguna/tambah/proses', [PenggunaController::class, 'store'])->name('daftar-pengguna.store');

Route::get('/daftar-pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('daftar-pengguna.edit');
Route::post('/daftar-pengguna/edit/{id?}/proses', [PenggunaController::class, 'update'])->name('daftar-pengguna.update');

Route::get('/daftar-pengguna/hapus/{id?}', [PenggunaController::class, 'destroy'])->name('daftar-pengguna.destroy');




