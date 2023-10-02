<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function task_dashboard() {
        active_tabs("task-dashboard", Route::currentRouteName());
        return view("back.pages.admin-task-dashboard");
    }
}
