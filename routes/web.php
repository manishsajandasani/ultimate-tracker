<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTaskCategoriesController;
use App\Http\Controllers\AdminTaskSubCategoriesController;

// Admin Routing
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('already.loggedin')->group(function () {
    Route::get('/', [AuthController::class, 'login_view'])->name('login.view');
    Route::post('/authorize-login', [AuthController::class, 'login'])->name('login.authorize');
});

Route::middleware('is.loggedin')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Admin Task Categories Routing
Route::middleware('is.loggedin')->group(function () {
    Route::controller(AdminTaskCategoriesController::class)->group(function () {
        Route::prefix("/task-categories")->name('admin.task.categories.')->group(function () {
            Route::get('/all', 'task_categories_index')->name('index');
            Route::get('/create', 'task_categories_create')->name('create');
            Route::post('/store', 'task_categories_store')->name('store');
            Route::get('/edit/{the_id}', 'task_categories_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'task_categories_update')->name('update');
        });
    });
});

// Admin Task Sub-Categories Routing
Route::middleware('is.loggedin')->group(function () {
    Route::controller(AdminTaskSubCategoriesController::class)->group(function () {
        Route::prefix("/task-sub-categories")->name('admin.task.sub.categories.')->group(function () {
            Route::get('/all', 'task_sub_categories_index')->name('index');
            Route::get('/create', 'task_sub_categories_create')->name('create');
            Route::post('/store', 'task_sub_categories_store')->name('store');
            Route::get('/edit/{the_id}', 'task_sub_categories_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'task_sub_categories_update')->name('update');
        });
    });
});