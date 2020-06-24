<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Validator;
use Socialite;
use App\User;
use App\UserDetails;

class AuthController extends Controller
{
    //

    public function login() {
        return view('auth.login');
    }

    public function logout() {
        Auth::logout();
        \Session::flush();
        return redirect('/');
    }


    public function redirectToProvider()
    {
        try {
            // $oauth_token = env('TWITTER_ACCESS_TOKEN');
            // $oauth_token_secret = env('TWITTER_ACCESS_TOKEN_SECRET');

            // return Socialite::driver('twitter')->userFromTokenAndSecret($oauth_token, $oauth_token_secret);
            return Socialite::driver('twitter')->redirect();
        } catch (\Exception $e) {
            return redirect(route('login'))->withError('Error authenticating you at the moment. Please try again.');
        }
    }

    public function handleProviderCallback()
    {
        // die('reached callback function');
        try {
            $userSocial = Socialite::driver('twitter')->user();
        } catch (\Exception $e) {
            return redirect(route('login'))->withError('An error occured. Please try again.');
        }
        $user =  User::updateOrCreate(
                        ['twitter_id' => $userSocial->id],
                        [
                            'token' => $userSocial->token,
                            'secret' => $userSocial->tokenSecret,
                            'twitter_handle' => $userSocial->getNickname(),
                            'email' => $userSocial->getEmail() ?? $userSocial->getNickname()."@viralget.com.ng",
                            'name' => $userSocial->getName(),
                            'password' => $userSocial->tokenSecret,
                        ]
                    );
        if(!$user->api_token) {
            $user->update(['api_token' => \str_random(80)]);
        }

        Auth::login($user);

        if($user->subscription) {
           return redirect()->intended('campaigns');
        } else {
            return redirect()->intended(route('pricing'));
        }
        // $user->token;
    }


    public function signup() {
        if(Auth()->user()->details) {
            return redirect(route('campaigns.view'));
        }
        return view('auth.signup');
    }

    function postSignup() {

        $user = Auth()->user();

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
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
