<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[AuthController::class, 'login']);

Route::get('/admin/dashboard', function () {
    return view('backend.index');
});


Route::get('/admin/admin/list', function () {
    return view('backend.admin.list');
})->name('admin.list');

Route::post('login',[AuthController::class, 'authLogin'])->name('login.store');
Route::get('forget-password',[AuthController::class, 'forgetPassword'])->name('forget_password');