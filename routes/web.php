<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'show'])->name('dash');

/* Auth*/
Route::get("register", [RegisterController::class, 'create'])->name('Form-register');

Route::post("register", [RegisterController::class, 'store'])->name('register');

Route::post('logout', [LogoutController::class, 'destroy']);

Route::get("login", [LoginController::class, 'create'])->name('Form-login');

Route::post("login", [LoginController::class, 'authenticate'])->name('login');


Route::get('/request', [ForgotPasswordLinkController::class, 'create']);

Route::post('/request', [ForgotPasswordLinkController::class, 'store']);

Route::get('password/reset/{token}', [ForgotPasswordController::class, 'create'])->name('password.reset');

Route::post('/reset', [ForgotPasswordController::class, 'reset'])->name('reset');

Route::get("category", [CategoryController::class, 'index'])->name('get.category');

Route::get("Event", [EventController::class, 'index'])->name('get.event');
