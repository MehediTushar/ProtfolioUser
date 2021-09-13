<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\MainPagesController;

use App\Http\Controllers\protfolioPagesController;

use App\Http\Controllers\AboutPagesController;

use App\Http\Controllers\ContactFromController;



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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){

Route::get('/dashboard', [MainPagesController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/main', [MainPagesController::class, 'index'])->name('admin.main');
Route::put('/main', [MainPagesController::class, 'update'])->name('admin.main.update');
Route::get('/about/create', [AboutPagesController::class, 'create'])->name('admin.about.create');
Route::post('/about/create', [AboutPagesController::class, 'store'])->name('admin.about.store');
Route::get('/about/edit/{id}', [AboutPagesController::class, 'edit'])->name('admin.about.edit');
Route::post('/about/update/{id}', [AboutPagesController::class, 'update'])->name('admin.about.update');
Route::get('/about/view', [AboutPagesController::class, 'view'])->name('admin.about.view');
Route::delete('/about/destroy/{id}', [AboutPagesController::class, 'destroy'])->name('admin.about.destroy');
Route::get('/protfolio/create', [protfolioPagesController::class, 'create'])->name('admin.protfolio.create');
Route::put('/protfolio/create', [protfolioPagesController::class, 'store'])->name('admin.protfolio.store');
Route::get('/protfolio/edit/{id}', [protfolioPagesController::class, 'edit'])->name('admin.protfolio.edit');
Route::post('/protfolio/update/{id}', [protfolioPagesController::class, 'update'])->name('admin.protfolio.update');
Route::get('/protfolio/view', [protfolioPagesController::class, 'view'])->name('admin.protfolio.view');
Route::delete('/protfolio/destroy/{id}', [protfolioPagesController::class, 'destroy'])->name('admin.protfolio.destroy');

});


Route::post('/contact', [ContactFromController::class, 'store'])->name('contact.store');


Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', function () {
    return view('pages.dashboard');})->name('admin.dashboard');

    //Auth::routes();
