<?php

use App\Http\Controllers\GolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LemburController;
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
Route::resource('home', HomeController::class);
Route::resource('password/reset', UpdatePasswordController::class);

Route::group(['middleware' => ['auth', 'userlevel:Admin']], function () {
    // Route::get('/admin', function () {
    //     return view('admin.index');
    // });
    Alert::alert('Welcome', 'UIN PTIPD', 'success');
    Route::resource('user', UserController::class);

});

Route::group(['middleware' => ['auth', 'userlevel:Admin,User']], function () {
    Route::get('/home', function () {
        $lembur = Lembur::with('user')->where('user_id', Auth::user()->id)->firstOrFail();
        return view('lembur', ['lembur' => $lembur]);
    });
    Route::resource('lembur', LemburController::class);
    Route::resource('goals', GolController::class);

});
