<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPrioritiesController;
use App\Http\Controllers\AdminStatusesController;
use App\Http\Controllers\AdminTaskAssignedByController;
use App\Http\Controllers\AdminTaskCategoriesController;
use App\Http\Controllers\AdminTaskSubCategoriesController;

// Admin Routing
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('already.loggedin')->group(function () {
    Route::get('/', [AuthController::class, 'login_view'])->name('login.view');
    Route::post('/authorize-login', [AuthController::class, 'login'])->name('login.authorize');
});

Route::middleware('is.loggedin')->group(function () {
    Route::get('/admin-task-dashboard', [AdminController::class, 'task_dashboard'])->name('admin.task.dashboard');

    // Admin Task Categories Routing
    Route::controller(AdminTaskCategoriesController::class)->group(function () {
        Route::prefix("/task-categories")->name('admin.task.categories.')->group(function () {
            Route::get('/all', 'task_categories_index')->name('index');
            Route::get('/create', 'task_categories_create')->name('create');
            Route::post('/store', 'task_categories_store')->name('store');
            Route::get('/edit/{the_id}', 'task_categories_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'task_categories_update')->name('update');
        });
    });

    // Admin Task Sub-Categories Routing
    Route::controller(AdminTaskSubCategoriesController::class)->group(function () {
        Route::prefix("/task-sub-categories")->name('admin.task.sub.categories.')->group(function () {
            Route::get('/all', 'task_sub_categories_index')->name('index');
            Route::get('/create', 'task_sub_categories_create')->name('create');
            Route::post('/store', 'task_sub_categories_store')->name('store');
            Route::get('/edit/{the_id}', 'task_sub_categories_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'task_sub_categories_update')->name('update');
        });
    });

    // Admin Task Sub-Categories Routing
    Route::controller(AdminTaskAssignedByController::class)->group(function () {
        Route::prefix("/task-assigned-by")->name('admin.task.assigned.by.')->group(function () {
            Route::get('/all', 'task_assigned_by_index')->name('index');
            Route::get('/create', 'task_assigned_by_create')->name('create');
            Route::post('/store', 'task_assigned_by_store')->name('store');
            Route::get('/edit/{the_id}', 'task_assigned_by_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'task_assigned_by_update')->name('update');
        });
    });

    // Admin Statuses Routing
    Route::controller(AdminStatusesController::class)->group(function () {
        Route::prefix("/statuses")->name('admin.statuses.')->group(function () {
            Route::get('/all', 'statuses_index')->name('index');
            Route::get('/create', 'statuses_create')->name('create');
            Route::post('/store', 'statuses_store')->name('store');
            Route::get('/edit/{the_id}', 'statuses_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'statuses_update')->name('update');
        });
    });

    // Admin Priorities Routing
    Route::controller(AdminPrioritiesController::class)->group(function () {
        Route::prefix("/priorities")->name('admin.priorities.')->group(function () {
            Route::get('/all', 'priorities_index')->name('index');
            Route::get('/create', 'priorities_create')->name('create');
            Route::post('/store', 'priorities_store')->name('store');
            Route::get('/edit/{the_id}', 'priorities_edit')->whereNumber('the_id')->name('edit');
            Route::post('/update/{the_id}', 'priorities_update')->name('update');
        });
    });
});

