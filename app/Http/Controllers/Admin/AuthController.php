<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Keyword;
use App\Platform;
use App\Category;
use App\Account;


class AuthController extends Controller
{
    //
    function dashboard() {
        $data['categories'] = Category::count();
        $data['profiles'] = Account::count();
        $data['keywords'] = Keyword::count();
        $data['platforms'] = Platform::count();

        return view('admin.dashboard', $data);
    }

    function login() {
        return view('admin.auth.login');
    }

    function postReg() {
        //  \App\User::create([
        //     'name' => request()->email,
        //     'username' => request()->email,
        //     'email' => request()->email,
        //     'password' => Hash::make(request()->password),
        // ]);
      
    }

    function postLogin() {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = request()->only('email', 'password');


        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->with('status', ['type' => 'danger', 'message' => 'Invalid username/password']);
        }
    }

    function logout() {
        Auth::logout();
        return redirect()->intended(route('admin.login'));
    }


}
