<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Category;
use App\Influencers;
use App\Keyword;
use App\States;
use App\User;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;


use App\Subscription;
use App\ReportingHistory;
use App\ProfilingHistory;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchPageController extends Controller
{

    protected function authenticate() {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();
        // $user = User::first();

        return $user;
    }

    function list() {
        $user = $this->authenticate();

        if(!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        
        $q = request()->q;
        $keyword = request()->keyword;
        $category = request()->category;
        $followers = request()->followers;
        $location = request()->location;
        $er = request()->er;
        
        $filterInfluencers = (new Influencers)->with('category')->newQuery();
        
        if ($category) {
            $filterInfluencers->where(function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        }

        if ($location) {
            $filterInfluencers->where(function ($query) use ($location) {
                $query->where('location', $location);
            });
        }

        if ($er) {
            $filterInfluencers->where(function ($query) use ($er) {
                $query->where('engagement_rate', $er);
            });
        }
        
        if ($followers) {
            $filterInfluencers->where(function ($query) use ($followers) {
                           // ->where('min_cash', '<=',  $user->cash)
                if($followers === "low"){
                    $query->where('followers', '>=',  5000)
                        ->where('followers', '<=',  10000);
                }

                if($followers === "middle"){
                    $query->where('followers', '>=',  10000)
                        ->where('followers', '<=',  20000);
                }
                
                if($followers === "influencer"){
                    $query->where('followers', '>',  20000);
                }
            });
        }

        // $influencerProfiles = $filterInfluencers->paginate(15)->appends(request()->query());
        $influencerProfiles = $filterInfluencers->paginate(15);

        return response()->json([
            'status' => 'success',
            'data' => $influencerProfiles,
        ], 200);

        
    }


    public function getStates() {
        $states = States::get();

        return response($states);
    }

    public function getCategories() {
        $states = Category::get();

        return response($states);
    }


    public function profile() {
        $user = $this->authenticate();

        if(!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        $handle = Account::where('handle', 'like', '%'.request()->handle.'%')->first();

        if(!$handle) return response(['status' => 'error', 'message' => 'User handle not found']);


        if($handle->profile_data) {
            $data['profile'] = $handle->profile_data;
            $data['er'] = $handle->er;
        } else {
            $data['profile'] = $handle->twitterData();
            $data['er'] = $handle->er;
            $handle->profile_data =  json_encode($data['profile']);
            $handle->save();
        }

        if(!$data) return response(['status' => 'error', 'message' => 'Error retrieving handle\'s twitter data']);

        return response(['status' => 'success', 'data' => $data]);
    }
}
