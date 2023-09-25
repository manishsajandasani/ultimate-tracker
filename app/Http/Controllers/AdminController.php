<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard() {
        active_tabs("dashboard", Route::currentRouteName());
        return view("back.pages.admin-dashboard");
    }
}
