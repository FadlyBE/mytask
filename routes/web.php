<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
    PegawaiController,

};


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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::resource('/user', UserController::class);
	// Route::resource('/pegawai', PegawaiController::class);
	Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
	Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
	Route::post('/pegawai-store', [PegawaiController::class, 'store'])->name('pegawai.store');
	Route::get('/pegawai-edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
	Route::post('/pegawai-update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
	Route::post('/pegawai-storedetail', [PegawaiController::class, 'storedetail'])->name('pegawai.storedetail');
	Route::get('/pegawai-export', [PegawaiController::class, 'export'])->name('pegawai.export');
	Route::get('/pegawai-destroy/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

	

	// Route::get('/pegawai', function () {
	// 	return view('pegawai.index');
	// });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
