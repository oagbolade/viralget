<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Admin;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JwtMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $this->getAdminToken('admin_token');
        $admin = Admin::where(['remember_token' => $token])->first();
        
        if (!$admin) {
            return redirect()->route('admin.login')->with([
                'error' => 'You are not allowed to access this page. Admin login required'
            ]);
        }

        if ($this->isExpired($admin->updated_at)) {
            return redirect()->route('admin.login')->with([
                'error' => 'Session timed out',
            ]);
        }

        return $next($request);
    }

    public function getAdminToken($cookie_name)
    {
        if(!isset($_COOKIE[$cookie_name])){
            return '';
        }

        return $_COOKIE[$cookie_name];
    }

    public function isExpired($last_login)
    {
        $last_login = Carbon::parse($last_login);
        $now = Carbon::now();
        $time_difference = $last_login->diffInMinutes($now, false);

        if ($time_difference > 60) {
            // Expired
            return true;
        }

        return false;
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
