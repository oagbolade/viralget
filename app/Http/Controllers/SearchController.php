<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Category;
use App\Keyword;
use App\States;
use Abraham\TwitterOAuth\TwitterOAuth;
use Ixudra\Curl\Facades\Curl;
//use TwiTwitterAPIExchange;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;


use App\Subscription;
use App\Plans;
use App\ReportingHistory;
use App\ProfilingHistory;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchController extends Controller
{

    private $extraTweets = [];
    //

    function index(){
        return view('search.list');
    }

    function list() {
        $states = States::all();
        $category = request()->category;
        $keyword = request()->keyword;
        $q = request()->q;
        $er = request()->er;
        $fromDate = request()->fromDate;
        $toDate = request()->toDate;
        $user = Auth()->user();

        if($q) {
            //check if is an hashtag
            if(strpos($q, '@') === false) {
                $q = str_replace('%23', '', urlencode($q));
                return redirect(route('search.show', ['q' => $q])."?fromDate=$fromDate&toDate=$toDate");
            }
        }

        $categories = Category::get();
        $defaultCategory = Category::find(6);

        return view('profiles.list')
                ->with('q', $q)
                ->with('fromDate', $fromDate)
                ->with('toDate', $toDate)
                ->with('category', $category)
                ->with('keyword', $keyword)
                ->with('categories', $categories)
                ->with('defaultCategory', $defaultCategory)
                ->with('er', $er)
                ->with('states', $states);
    }

    function showHashtag() {
        $q = str_replace('%23', '', strip_tags(request()->q));

        $user = Auth()->user();


        if(!$user->subscription) {
            return redirect(route('pricing'))->withError('You do not have an active subscription plan. Please choose a subscription package to continue.');
        }


        $plan = $user->subscription->plan->name;

        if(request()->has('plan')) {
            $subscription = Plans::where('name', request()->plan)->first();

            if(!$subscription) {
                return redirect()->back()->withError('Invalid plan selected');
            }

            switch ($user->subscription->plan->name) {
                case 'Enterprise':
                    $proceed = (in_array($subscription->name, ['Free', 'Premium', 'Enterprise'])) ? true : false;
                    break;
                case 'Premium':
                    $proceed = (in_array($subscription->name, ['Free', 'Premium'])) ? true : false;
                    break;
                case 'Free':
                    $proceed = ($subscription->name == 'Free') ? true : false;
                    break;

                default:
                    $proceed = false;
                    break;
            }

            if(!$proceed) {
                return redirect()->back()->withError('Sorry, you do not have access to the specified plan. Please resubscribe/upgrade to gain access');
            }


            $plan = $subscription->name;
        }

        if($user->subscription->reporting_balance == 0) {
            return redirect(route('pricing'))->withError('You have reached your reporting balance limit. Please choose a subscription package to continue.');
        }

        return view('profiles.show')->with('q', $q)->with('is_hashtag', true)->withQ($q)->with('plan', $plan);
    }

    function showProfile() {
        $handle = request()->handle;
        $user = Auth()->user();

        if(!$user->subscription) {
            return redirect(route('pricing'))->withError('You do not have an active subscription plan. Please choose a subscription package to continue.');
        }


        if($user->subscription->profiling_balance == 0) {
            return redirect(route('pricing'))->withError('You have reached your profiling balance limit. Please choose a subscription package to continue.');
        }
        
        $profileExists = ProfilingHistory::where(['user_id' => $user->id, 'handle' => $handle])->oldest()->first();

        if($profileExists && !request()->reloadData) {
            return redirect(route('reporting.profile', ['id' => $profileExists->id]));
        }

        if($profileExists && request()->reloadData){
            return view('profiles.show')->with(['q' => $handle, 'reload' => true]);
        }

        return view('profiles.show')->with('q', $handle);
    }

    function search() {
        // $connection = new TwitterOAuth(env('CONSUMER_KEY'), env('CONSUMER_SECRET'), env('ACCESS_TOKEN'), env('TOKEN_SECRET'));
        // $trends = $connection->get("trends/place", ['id' => '23424908']);

        // if($trends[0]->trends) {
        //     $trends = $trends[0]->trends;
        // } else {
        //     $trends = [];
        // }

        $trends = [];
        return view('pages.search')->withTrends($trends)->withIsDarkBg(true);
    }


    private function getExtraTweets($q, $max_id, $connection) {

        $tweets = $connection->get("search/tweets", ['q' => $q, 'count' => '100', 'max_id' => $max_id]);

        if(count($tweets->statuses) > 0) {
            dd($tweets->statuses);
           $this->extraTweets[] = $this->getExtraTweets($q, $tweets->search_metadata->max_id, $connection);
        } else {
            return false;
        }

    }


    function guzzleClient($path, $data, $token = '', $secret = '') {

        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => env('TWITTER_CONSUMER_KEY'),
            'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
            'token'           => $token ?? env('TWITTER_ACCESS_TOKEN'),
            'token_secret'    => $secret ?? env('TWITTER_ACCESS_TOKEN_SECRET')
        ]);
        $stack->push($middleware);

        $client = new Client([
            'base_uri' => 'https://api.twitter.com/1.1/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);


        try {
            $res = $client->get($path.'.json', ['query' => $data]);
        } catch(\Exception $e) {
            $response = new \stdClass;
            $response->error = $e->getMessage();
            return $response;
        }

        $response = json_decode($res->getBody());

        return $response;
    }
}
