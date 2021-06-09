<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('/admin/store', [UserController::class, 'store'])->name('admin.store');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/admin/showloginform', [LoginController::class, 'showLoginForm'])->name('admin.showloginform');
    Route::get('/admin/create', [UserController::class, 'create'])->name('admin.create');
    Route::get('/admin/dashboard', [LoginController::class, 'dashboard']);
});