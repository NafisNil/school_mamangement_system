<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
Route::get('/', function () {
    return view('auth.login');
})->name('index');
Route::get('/login',[AuthController::class, 'login'])->name('login');

Route::get('/admin/dashboard', function () {
    return view('backend.index');
});


// Route::get('/admin/admin/list', function () {
//     return view('backend.admin.list');
// })->name('admin.list');

Route::post('/login',[AuthController::class, 'authLogin'])->name('login.store');
Route::get('/logout-user',[AuthController::class, 'logout'])->name('logout.user');
Route::get('forget-password',[AuthController::class, 'forgetPassword'])->name('forget_password');
Route::post('forget-password',[AuthController::class, 'postForgetPassword'])->name('post_forget_password');
Route::get('reset-password/{token}',[AuthController::class, 'resetPassword'])->name('reset');
Route::post('reset-password/{token}',[AuthController::class, 'postResetPassword'])->name('post.reset');
Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/admin/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('/admin/admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('/admin/admin/add', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    Route::get('/admin/class/list', [GradeController::class, 'list'])->name('class.list');
    Route::get('/admin/class/add', [GradeController::class, 'add'])->name('class.add');
    Route::post('/admin/class/add', [GradeController::class, 'store'])->name('class.store');
    Route::get('/admin/class/edit/{id}', [GradeController::class, 'edit'])->name('class.edit');
    Route::post('/admin/class/update/{id}', [GradeController::class, 'update'])->name('class.update');
    Route::get('/admin/class/delete/{id}', [GradeController::class, 'delete'])->name('class.delete');


    Route::get('/admin/subject/list', [SubjectController::class, 'list'])->name('subject.list');
    Route::get('/admin/subject/add', [SubjectController::class, 'add'])->name('subject.add');
    Route::post('/admin/subject/add', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/admin/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::post('/admin/subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::get('/admin/subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');

    Route::get('/admin/assign_subject/list', [ClassSubjectController::class, 'list'])->name('assign_subject.list');
    Route::get('/admin/assign_subject/add', [ClassSubjectController::class, 'add'])->name('assign_subject.add');
    Route::post('/admin/assign_subject/add', [ClassSubjectController::class, 'store'])->name('assign_subject.store');
    Route::get('/admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit'])->name('assign_subject.edit');
    Route::post('/admin/assign_subject/update/{id}', [ClassSubjectController::class, 'update'])->name('assign_subject.update');
    Route::get('/admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete'])->name('assign_subject.delete');
});

Route::group(['middleware' => 'teacher'], function(){
    Route::get('/teacher/dashboard', [DashboardController::class, 'dashboard'])->name('teacher.dashboard');
});

Route::group(['middleware' => 'student'], function(){
    Route::get('/student/dashboard', [DashboardController::class, 'dashboard'])->name('student.dashboard');
});

Route::group(['middleware' => 'parent'], function(){
    Route::get('/parent/dashboard', [DashboardController::class, 'dashboard'])->name('parent.dashboard');
});