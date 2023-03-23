<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\AxiosController;
use App\Http\Controllers\Admin\GoOutController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\ProgrammerController;
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
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\GetJemaatController;
use App\Http\Controllers\ReadNewsController;

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

Route::get('/berita', [ReadNewsController::class, 'index'])->name('news');
Route::get('/berita/baca/{id}', [ReadNewsController::class, 'show'])->name('read.show');

Route::get('/developer', [ProgrammerController::class, 'index'])->name('developer');
Route::get('/kegiatan', [ActivityController::class, 'index'])->name('activity');
Route::get('/jemaat/{id}', [GetJemaatController::class, 'show'])->name('getJemaat');

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

    Route::get('/sidi', [SidiController::class, 'index'])->name('sidi.index');
    Route::get('/sidi/create', [SidiController::class, 'create'])->name('sidi.create');
    Route::get('/getFamilyMember/{id}', [SidiController::class, 'getFamilyMember'])->name('getFamilyMember');
    Route::post('/sidi/store', [SidiController::class, 'store'])->name('sidi.store');
    Route::get('/sidi/show/{id}', [SidiController::class, 'show'])->name('sidi.show');
    Route::get('/sidi/edit/{id}', [SidiController::class, 'edit'])->name('sidi.edit');
    Route::post('/sidi/update/{id}', [SidiController::class, 'update'])->name('sidi.update');
    Route::post('/sidi/destroy/{id}', [SidiController::class, 'destroy'])->name('sidi.destroy');

    Route::get('/monding', [MondingController::class, 'index'])->name('monding.index');
    Route::get('/monding/create', [MondingController::class, 'create'])->name('monding.create');
    Route::get('/getFamilyMember/{id}', [MondingController::class, 'getFamilyMember'])->name('getFamilyMember');
    Route::post('monding/store', [MondingController::class, 'store'])->name('monding.store');
    Route::get('/monding/edit/{id}', [MondingController::class, 'edit'])->name('monding.edit');
    Route::post('/monding/update/{id}', [MondingController::class, 'update'])->name('monding.update');
    Route::post('/monding/destroy/{id}', [MondingController::class, 'destroy'])->name('monding.destroy');

    Route::get('/baptis', [BaptismController::class, 'index'])->name('baptis.index');
    Route::get('/baptis/create', [BaptismController::class, 'create'])->name('baptis.create');
    Route::get('/getFamilyMember/{id}', [BaptismController::class, 'getFamilyMember'])->name('getFamilyMember');
    Route::post('baptis/store', [BaptismController::class, 'store'])->name('baptis.store');
    Route::get('/baptis/show/{id}', [BaptismController::class, 'show'])->name('baptis.show');
    Route::get('/baptis/edit/{id}', [BaptismController::class, 'edit'])->name('baptis.edit');
    Route::post('/baptis/update/{id}', [BaptismController::class, 'update'])->name('baptis.update');
    Route::post('/baptis/destroy/{id}', [BaptismController::class, 'destroy'])->name('baptis.destroy');

    Route::resource('/berita', ReportController::class);

    Route::resource('/banner', BannerController::class);
    Route::resource('/news', NewsController::class);

    Route::resource('/pindah', ShiftController::class);

    Route::resource('/keluar', GoOutController::class);

    Route::resource('/kegiatan', AdminActivityController::class);

    Route::get('/print', [PrintController::class, 'index'])->name('print');
    Route::post('/print/data', [PrintController::class, 'print'])->name('print-data');

    Route::post('family', [AxiosController::class, 'family'])->name('family');
    Route::post('family-member', [AxiosController::class, 'familyMember'])->name('family_member');
  });
});