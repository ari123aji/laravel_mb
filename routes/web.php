<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\DashboardPesanController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\PelangganController;

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
    return view('home', [
        "title" => "HOME"
    ]);
});
Route::get('/tentang', function () {
    return view('tentang', [
        "title" => "Tentang Arranger"
    ]);
});
Route::get('/documentation', [DocController::class, 'index'])->middleware('guest');
Route::get('/pelanggan', [PelangganController::class, 'index'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authentication']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// Route::post('/dashboard/pesan', function() {
//     return view('dashboard.pesan.buatpesan');
// });
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');
Route::get('/admin', function() {
    return view('admin.homeadmin');
})->middleware('auth');
Route::get('/dashboard/orders/checkSlug', [DashboardPesanController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboardadmin/checkSlug', [DashboardAdminController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/orders', DashboardPesanController::class)->middleware('auth');
Route::resource('/dashboardadmin', DashboardAdminController::class)->middleware('auth');