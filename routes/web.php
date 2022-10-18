<?php
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('lembur', LemburController::class);
    Route::resource('user', UserController::class);

});

Route::group(['middleware' => ['auth', 'userlevel:Admin,User']], function () {
    Route::get('/home', function () {
        return view('welcome');
    });
    Alert::alert('Welcome', 'Admin UIN PTIPD', 'success');
    Route::resource('lembur', LemburController::class);

});
