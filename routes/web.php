<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PetaController;

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

// ===========================================
// Public Routes (No Auth Required)
// ===========================================
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/peta-jemaat', [PublicController::class, 'peta'])->name('public.peta');
Route::get('/kegiatan-gereja', [PublicController::class, 'kegiatan'])->name('public.kegiatan');
Route::get('/profil', [PublicController::class, 'profil'])->name('public.profil');

// ===========================================
// Auth Routes (Guest)
// ===========================================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'authenticate']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// ===========================================
// Admin Routes (Protected)
// ===========================================
Route::middleware('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('wilayah', WilayahController::class);
  Route::resource('jemaat', JemaatController::class);
  Route::resource('kegiatan', KegiatanController::class);
  Route::resource('pengaturan', PengaturanController::class);
  Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
});

// ===========================================
// Peta API (Internal/Public if needed)
// ===========================================
Route::get('/peta/data', [PetaController::class, 'data'])->name('peta.data');
