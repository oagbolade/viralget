<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Influencers;
use App\Category;
use App\FilterCategories;
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

class SearchController extends Controller
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

        $states = States::all();

        $category = request()->category;
        $keyword = request()->keyword;
        $location = request()->location;
        $er = request()->er;
        $q = request()->q;

        $filter = (new Account)->with('category')->newQuery();


        if($q) {
            $q = str_replace('@', '', $q);
            $filter->where('handle', 'like', '%'.$q.'%');

            //check if account exists on twitter and doesn't exist in db. If yes, create record.
            $account = Account::where('handle', 'like', '%'.$q.'%')->first();

            if(!$account) {
                    $acc = new Account;
                    $exists = $acc->checkExists($q);
                    if(!$filter->count() && $exists !== false) {
        //                $keyword = \App\Keyword::getKeyword($exists->description);
                        $_category = ($keyword !== null) ? $keyword->category_id : 6;

                        Account::firstOrCreate(
                            ['handle' => $q],
                            [
                                'platform_id' => 1,
                                'category_id' => $_category,
                            ]
                        );

                        $filter->where('handle', 'like', '%'.$q.'%');

                    }
            }

        }

        if($category) {
            $filter->where( function($query) use($category) {

                $cat = Category::where('slug', $category)->first(); //parent

            //    $query->where('id', $cat->id);

                $children = [];
                if($cat->children()->count() > 0) {
                    $children = $cat->children()->pluck('id')->toArray(); //and children

                    foreach($cat->children()->get() as $child) {
                        if($child->children()->count() > 0) {
                            $_child = $child->children()->pluck('id')->toArray(); //and sub-children
                            foreach($_child as $c) {
                                array_push($children, $c);
                            }
                        }
                    }
                }
                array_push($children, $cat->id); //add the parent to its children

               $query->whereIn('category_id', $children);

            });
        }

        if($keyword) {
            $filter->where( function($query) use($keyword) {
                 $query->where('keyword', $keyword);
            });
        }

        if($location) {
            $filter->where( function($query) use($location) {
                 $query->where('location', $location);
            });
        }

        if($er) {
            $filter->orderBy('er', $er == 'high'? 'DESC' : 'ASC');
        }

//       dd([$filter->toSql(), $filter->getBindings()]);
        $query = $q;
        $profiles = $filter->paginate(15)->appends(request()->query());


        return response(['data' => $profiles, 'status' => 'success']);
    }


    public function getStates() {
        $states = States::get();

        return response($states);
    }

    public function getCategories() {
        $categories = Category::get();

        return response($categories);
    }
    
    public function getFilterCategories() {
        $filter_categories = FilterCategories::get();

        return response($filter_categories);
    }


    public function profile() {
        $user = $this->authenticate();

        if(!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        $handle = Influencers::where('handle', 'like', '%'.request()->handle.'%')->first();
        // Add option to also check influencers table

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
