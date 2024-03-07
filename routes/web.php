<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use Illuminate\Routing\Route as RoutingRoute;
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


Route::get('/', [HomeController::class, 'welcome']);

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('category', [CategoryController::class, 'index'])->name('get.category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('create.category');
    Route::post('category', [CategoryController::class, 'store'])->name('category');
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('show.category');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('category/{category}', [CategoryController::class, 'update'])->name('update.category');
    Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/dashboard', [DashController::class, 'index'])->name('dash');
    Route::get('/validate-events', [DashboardController::class, 'showValidationPage'])->name('validate.events');
    Route::post('/validate-event/{id}', [DashboardController::class, 'validateEvent'])->name('validate.event');
});
Route::get('/search', [EventController::class, 'search'])->name('search');

Route::post('logout', [LogoutController::class, 'destroy'])
    ->middleware('auth');
Route::get("register", [RegisterController::class, 'create'])->name('Form-register');

Route::post("register", [RegisterController::class, 'store'])->name('register');

Route::get("login", [LoginController::class, 'create'])->name('Form-login');

Route::post("login", [LoginController::class, 'authenticate'])->name('login');
Route::middleware('guest')->group(function () {


    Route::get('/request', [ForgotPasswordLinkController::class, 'create']);

    Route::post('/request', [ForgotPasswordLinkController::class, 'store']);

    Route::get('password/reset/{token}', [ForgotPasswordController::class, 'create'])->name('password.reset');

    Route::post('/reset', [ForgotPasswordController::class, 'reset'])->name('reset');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get("client", [ClientController::class, 'index'])->name('client');
});

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get("clients", [EventController::class, 'index'])->name('clients');
});
Route::delete('/soft-delete/event/{id}', [EventController::class, 'softDeleteEvent'])->name('soft-delete.event');

Route::get('/events/create', [EventController::class, 'create'])->name('get.event');

Route::post('/events', [EventController::class, 'store'])->name('Events.store');

Route::get('/events/{Event}', [EventController::class, 'show'])->name('Events.show');

Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('Events.edit');

Route::put('/events/{event}', [EventController::class, 'update'])->name('Events.update');

Route::delete('/events/{Event}', [EventController::class, 'destroy'])->name('Events.destroy');


Route::middleware(['auth'])->group(function () {
    Route::post('/ask_permission', [PermissionController::class, 'ask'])->name('asckPermission');
});
