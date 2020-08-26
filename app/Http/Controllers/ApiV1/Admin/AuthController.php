<?php

namespace App\Http\Controllers\ApiV1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['login']]);
    }

    public function createAdmin(Request $request)
    {
        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return 'registered!';
    }

    function login(Request $request)
    {
        $email = request()->email;
        $credentials = $request->only('email', 'password');
       
        if ($token = $this->guard()->attempt($credentials)) {
            $cookie_name = "admin_token";
            $this->setAdminCookie($cookie_name, $token);
            $this->updateToken($email, $token);
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function getAdminCredentials()
    {
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function updateToken($email, $token)
    {
        Admin::where('email', $email)->update(array('remember_token' => $token));
    }
    
    public function setAdminCookie($cookie_name, $cookie_value)
    {
        setcookie(
            $cookie_name,
            $cookie_value,
            time() + (86400 * 30),
            "/"
        );
    }

    public function deleteAdminCookie($cookie_name)
    {
        setcookie(
            $cookie_name,
            '',
            time() - (86400 * 30),
            "/"
        );
    }
}
