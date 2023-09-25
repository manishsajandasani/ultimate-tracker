<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCategoriesController;

// Admin Routing
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('already.loggedin')->group(function () {
    Route::get('/', [AuthController::class, 'login_view'])->name('login.view');
    Route::post('/authorize-login', [AuthController::class, 'login'])->name('login.authorize');
});

Route::middleware('is.loggedin')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Admin Departments Routing
Route::middleware('is.loggedin')->group(function () {
    Route::controller(AdminCategoriesController::class)->group(function () {
        Route::prefix("/categories")->name('admin.categories.')->group(function () {
            Route::get('/all', 'categories_index')->name('index');
            Route::get('/create', 'categories_create')->name('create');
            Route::post('/store', 'categories_store')->name('store');
            Route::get('/edit/{the_id}', 'categories_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'categories_update')->name('update');
        });
    });
});