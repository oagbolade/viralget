<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Validator;
use Socialite;
use App\User;
use App\UserDetails;
use Abraham\TwitterOAuth\TwitterOAuth;
use Cookie;
use Exception;

class AuthController extends Controller
{
    private $_connection;

    function __construct()
    {
        $this->_connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        \Session::flush();
        return redirect('/');
    }

    public function redirectToProvider()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            return redirect(route('login'))->withError('Error authenticating you at the moment. Please try again.');
        }
    }
    
    public function handleProviderCallback(Request $request)
    {
        try {
            $get_user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect(route('login'))->withError('An error occured. Please try again.');
        }

        $token =  json_encode($get_user->token);
        $avatar =  json_encode($get_user->avatar);

        try {
            $user =  User::updateOrCreate(
                ['email' => $get_user['email']],
                [
                    'twitter_id' => $get_user['sub'],
                    'name' => $get_user['name'],
                    'password' => $token,
                    'avatar' => $avatar,
                    'token' => $token,
                    'secret' => $token,
                ]
            );
        } catch (\Exception $e) {
            return redirect(route('login'))->withError('An error occured. Please try again.');
        }

        if (!$user->api_token) {
            $user->update(['api_token' => \str_random(80)]);
        }

        Auth::login($user);

        // return $user;
        if ($user->subscription) {
            return redirect()->intended('campaigns');
        } else {
            return redirect()->intended(route('pricing'));
        }
    }

    public function signup()
    {
        if (Auth()->user()->details) {
            return redirect()->intended('campaigns');
        }

        return view('auth.signup');
    }

    function postSignup()
    {

        $user = Auth()->user();

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'role' => 'required',
            'phone' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        UserDetails::create([
            'user_id' => $user->id,
            'name' => request()->name,
            'email' => request()->email,
            'company_name' => request()->company_name,
            'city' => request()->city,
            'phone' => request()->phone,
            'role' => request()->role,
            'address' => request()->address,
            'objective' => request()->objective,
        ]);

        return redirect()->intended(route('pricing'))->withSuccess('Profile successfully updated! You can now select a pricing plan to continue...');
    }
}
