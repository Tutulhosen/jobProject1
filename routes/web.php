<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAuthController;
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

Route::get('/user-dashboard',[AdminUserController::class, 'index'])->name('admin.user.dashboard')->middleware('admin');
Route::get('/user-register',[AdminUserController::class, 'userRegisterPage'])->name('admin.user.register.page')->middleware('admin.redirect');
Route::get('/user-login',[AdminAuthController::class, 'userLoginPage'])->name('admin.user.login.page')->middleware('admin.redirect');
Route::post('/user-login',[AdminAuthController::class, 'userLoginProcess'])->name('admin.user.login')->middleware('admin.redirect');
Route::post('/user-register',[AdminUserController::class, 'userRegister'])->name('admin.user.register')->middleware('admin.redirect');
Route::get('/user-status-update/{id}',[AdminUserController::class, 'userstatusUpdate'])->name('admin.user.status.update')->middleware('admin');
Route::get('/user-delete/{id}',[AdminUserController::class, 'destroy'])->name('admin.user.destroy')->middleware('admin');
Route::get('/user-logout', [AdminAuthController::class, 'logout'])->name('admin.user.logout')->middleware('admin');