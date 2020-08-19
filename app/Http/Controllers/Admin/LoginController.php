<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['showLogin']]);
    }

    public function showLogin()
    {
        return view('administrator.auth.login');
    }
}
