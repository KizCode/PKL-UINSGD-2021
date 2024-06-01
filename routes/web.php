<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UserController;
use App\Models\Lembur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login', [AuthController::class, 'login'])->name('login');

// Register
// Route::post('/register', [AuthController::class, 'store'])->name('store');
// Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::group(['middleware' => ['auth', 'userlevel:Admin,User']], function () {
    Route::resource('lembur', LemburController::class);
    Route::resource('goals', GolController::class);
    Route::resource('pekerjaan', PekerjaanController::class);
    Route::resource('profile',ProfilController::class);

});

Route::group(['middleware' => ['auth', 'userlevel:Admin']], function () {
    Alert::alert('Welcome', 'UIN PTIPD', 'success');
    Route::resource('user', UserController::class);
    Route::resource('jabatan', JabatanController::class);

});

