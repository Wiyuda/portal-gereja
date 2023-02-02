<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SidiController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\PriestController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\BaptismController;
use App\Http\Controllers\Admin\MarriedController;
use App\Http\Controllers\Admin\MondingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FamilyMemberController;

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
    Route::resource('/member', FamilyMemberController::class);

    Route::get('/kawin', [MarriedController::class, 'index'])->name('kawin');
    Route::get('/kawin/create', [MarriedController::class, 'create'])->name('kawin.create');
    Route::get('getFamilyMember/{id}', [MarriedController::class, 'getFamilyMember'])->name('getFamilyMember');
    Route::post('/kawin/store', [MarriedController::class, 'store'])->name('kawin.store');
    Route::get('/kawin/show/{id}', [MarriedController::class, 'show'])->name('kawin.show');
    Route::get('/kawin/edit/{id}', [MarriedController::class, 'edit'])->name('kawin.edit');
    Route::post('/kawin/update/{id}', [MarriedController::class, 'update'])->name('kawin.update');
    Route::post('/kawin/destroy/{id}', [MarriedController::class, 'destroy'])->name('kawin.destroy');

    Route::resource('/sidi', SidiController::class);

    Route::get('/monding', [MondingController::class, 'index'])->name('monding.index');
    Route::get('/monding/create', [MondingController::class, 'create'])->name('monding.create');
    Route::get('/getFamilyMember/{id}', [MondingController::class, 'getFamilyMember'])->name('getFamilyMember');
    Route::post('monding/store', [MondingController::class, 'store'])->name('monding.store');
    Route::get('/monding/edit/{id}', [MondingController::class, 'edit'])->name('monding.edit');
    Route::post('/monding/update/{id}', [MondingController::class, 'update'])->name('monding.update');
    Route::post('/monding/destroy/{id}', [MondingController::class, 'destroy'])->name('monding.destroy');

    Route::resource('/baptis', BaptismController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/news', NewsController::class);
  });
});