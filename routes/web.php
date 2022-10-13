<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home', HomeController::class);
Route::resource('password/reset', UpdatePasswordController::class);

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('lembur', LemburController::class);
    Route::resource('user', UserController::class);
    Route::resource('akun', SiswaController::class);
    Route::resource('jurusan', JurusanController::class);

});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::resource('lembur', LemburController::class);

});
