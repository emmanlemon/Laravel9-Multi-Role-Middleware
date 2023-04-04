<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServiceListController;
use App\Http\Controllers\ShopController;

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
    return view('welcome');
});

// Auth::routes();
// // User Route
// Route::prefix('user')->group(function () {
//     Route::get("/home",[HomeController::class,'userHome'])->name('home');
// })->middleware('auth','user-role:user');

// // superadmin Route
// Route::prefix('superadmin')->group(function () {
//     Route::get("/home",[HomeController::class,'superadminHome'])->name('home.superadmin');
//     Route::resource("/serviceList" , ServiceListController::class);
// })->middleware('auth','user-role:superadmin');

// // Admin Route
// Route::prefix('admin')->group(function () {
//     Route::get("/home",[HomeController::class,'adminHome'])->name('home.admin');
//     Route::resource("/shops" , ShopController::class);
//     Route::resource("/service" , ServiceController::class);
// })->middleware('auth','user-role:admin');

Auth::routes();
// User Route
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class,'userHome'])->name('home');
});

// superadmin Route
Route::middleware(['auth','user-role:superadmin'])->group(function()
{
    Route::get("/superadmin/home",[HomeController::class,'superadminHome'])->name('home.superadmin');
    Route::resource("/serviceList" , ServiceListController::class);
});

// Admin Route
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class,'adminHome'])->name('home.admin');
    Route::resource("/shops" , ShopController::class);
    Route::resource("/service" , ServiceController::class);
});