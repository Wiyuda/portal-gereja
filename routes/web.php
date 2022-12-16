<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\PriestController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/post',[LoginController::class,'loginPost'])->name('loginPost');

Route::prefix('/admin')->group(function () {
  Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/admin', AdminController::class);
    Route::resource('/profil', ProfilController::class);
    Route::resource('/pastur', PriestController::class);
    Route::resource('/sektor', SectorController::class);
    Route::resource('/keluarga', FamilyController::class);
  });
});