<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login_view() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]); 

        $user = DB::table('users')->where('email', '=', $request->email)->first();

        if($user) {
            if(Hash::check($request->password, $user->password)) {
                Session::put('userid', $user->id);
                Session::put('username', $user->name);
                Session::put('useremail', $user->email);
                Session::put('userrole', $user->role);
                Session::put('useractive', $user->is_active);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->withInput()->with('invalid-credentials', "Password is not correct."); 
            }
        }

        return back()->withInput()->with('invalid-credentials', "Email is not registered with us.");
    }

    public function logout() {
        if(Session::has('userid')) {
            Session::flush();
            return redirect()->route('login.view');
        }
    }
}
