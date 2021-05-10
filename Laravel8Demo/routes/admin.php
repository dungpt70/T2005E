<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProductController;

// dieu huong trong phan admin
// /admin/login
Route::get('login', [AdminLoginController::class, 'getLoginForm'])->name('admin.getlogin');
Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


Route::get('/dashboard', function () {
    return view('welcome');
})->name('admin.dashboard')->middleware('admin.auth');

// goi toi chuc nang crud quan ly san pham
Route::resource("product", ProductController::class)->middleware('admin.auth');