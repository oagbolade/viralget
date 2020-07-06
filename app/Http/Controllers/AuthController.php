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

class AuthController extends Controller
{
    private $_connection;
    private $_callback;

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
        $request_token = $this->_connection->oauth('oauth/request_token', array('oauth_callback' => env('TWITTER_CALLBACK')));
        $oauth_token = $request_token['oauth_token'];
        $oauth_token_secret = $request_token['oauth_token_secret'];

        session(['oauth_token' => $oauth_token]);
        session(['oauth_token_secret' => $oauth_token_secret]);

        $url = $this->_connection->url('oauth/authorize', array('oauth_token' => $oauth_token));

        return redirect($url);
    }

    public function handleProviderCallback(Request $request)
    {

        $request_token = [];
        $request_token['oauth_token'] = $request->session()->pull('oauth_token', 'default');
        $request_token['oauth_token_secret'] = $request->session()->pull('oauth_token_secret', 'default');

        $this->_connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $request_token['oauth_token'], $request_token['oauth_token_secret']);

        if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
            return redirect(route('login'))->withError('Error authenticating you at the moment. Please try again.');
        } else {
            $access_token = $this->_connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);
            $this->_connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $access_token['oauth_token'], $access_token['oauth_token_secret']);

            $userData = json_decode($this->userCredentials());

            try {
                $user =  User::updateOrCreate(
                    ['twitter_id' => $access_token['user_id']],
                    [
                        'token' => $access_token['oauth_token'],
                        'secret' => $access_token['oauth_token_secret'],
                        'twitter_handle' => $userData->screen_name,
                        'email' => $userData->email ?? $userData->name . "@viralget.com.ng",
                        'name' => $userData->name,
                        'password' => $access_token['oauth_token_secret'],
                    ]
                );
            } catch (\Exception $e) {
                return redirect(route('login'))->withError('An error occured. Please try again.');
            }

            if (!$user->api_token) {
                $user->update(['api_token' => \str_random(80)]);
            }

            Auth::login($user);

            if ($user->subscription) {
                return redirect()->intended('campaigns');
            } else {
                return redirect()->intended(route('pricing'));
            }
        }
    }

    public function userCredentials()
    {
        $user = $this->_connection->get('account/verify_credentials', ['include_email' => 'true', 'tweet_mode' => 'extended', 'include_entities' => 'true']);
        return json_encode($user);
    }

    public function redirectToProvider1()
    {
        try {
            return Socialite::driver('twitter')->redirect();
        } catch (\Exception $e) {
            return redirect(route('login'))->withError('Error authenticating you at the moment. Please try again.');
        }
    }

    public function handleProviderCallback1()
    {
        die(request()->oauth_token . request()->oauth_verifier);
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
                'email' => $userSocial->getEmail() ?? $userSocial->getNickname() . "@viralget.com.ng",
                'name' => $userSocial->getName(),
                'password' => $userSocial->tokenSecret,
            ]
        );
        if (!$user->api_token) {
            $user->update(['api_token' => \str_random(80)]);
        }

        Auth::login($user);

        if ($user->subscription) {
            return redirect()->intended('campaigns');
        } else {
            return redirect()->intended(route('pricing'));
        }
        // $user->token;
    }


    public function signup()
    {
        if (Auth()->user()->details) {
            return redirect(route('campaigns.view'));
        }
        return view('auth.signup');
    }

    function postSignup()
    {

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
