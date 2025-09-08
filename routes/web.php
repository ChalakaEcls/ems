<?php

use App\Http\Controllers\AdminClassController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentSubscriptionController;
use Illuminate\Support\Facades\Route;

// Student Routes
Route::get('/student/register', [StudentAuthController::class, 'showRegistrationForm'])->name('student.register.form');
Route::post('/student/register', [StudentAuthController::class, 'register'])->name('student.register');
Route::get('/student/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [StudentAuthController::class, 'login'])->name('student.login.submit');
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

Route::middleware(['auth:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::post('/student/subscribe/{classId}', [StudentController::class, 'subscribe'])->name('student.subscribe');
    Route::delete('/student/unsubscribe/{subscriptionId}', [StudentController::class, 'unsubscribe'])->name('student.unsubscribe');
});

// Admin Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
// Admin Registration Routes
Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm']);

Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/classes', [AdminClassController::class, 'index'])->name('admin.classes.index');
    Route::get('/admin/classes/create', [AdminClassController::class, 'create'])->name('admin.classes.create');
    Route::post('/admin/classes/store', [AdminClassController::class, 'store'])->name('admin.classes.store');
    Route::get('/admin/classes/{class}/show', [AdminClassController::class, 'show'])->name('admin.classes.show');
    Route::put('/admin/classes/{class}/update', [AdminClassController::class, 'update'])->name('admin.classes.update');
    Route::delete('/admin/classes/{class}/delete', [AdminClassController::class, 'destroy'])->name('admin.classes.destroy');
    Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');

});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/subscriptions', [StudentSubscriptionController::class, 'index'])->name('admin.subscriptions.index');
    Route::get('/admin/subscriptions/create', [StudentSubscriptionController::class, 'create'])->name('admin.subscriptions.create');
    Route::post('/admin/subscriptions/store', [StudentSubscriptionController::class, 'store'])->name('admin.subscriptions.store');
    Route::get('/admin/subscriptions/{subscription}/show', [StudentSubscriptionController::class, 'show'])->name('admin.subscriptions.show');
    Route::put('/admin/subscriptions/{subscription}/update', [StudentSubscriptionController::class, 'update'])->name('admin.subscriptions.update');
    Route::delete('/admin/subscriptions/{subscription}/delete', [StudentSubscriptionController::class, 'destroy'])->name('admin.subscriptions.destroy');

});

// Home Routes
Route::get('/', [StudentAuthController::class, 'showLoginForm']);