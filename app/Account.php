<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Abraham\TwitterOAuth\TwitterOAuth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;


class Account extends Model
{
    //
    protected $fillable = [
            'id', 'category_id', 'handle', 'name', 'platform_id', 'category_id', 'followers', 'following', 'tweets_count', 'average_likes', 'average_replies', 'average_views', 'engagement_rate', 'date_joined', 'avatar_url', 'er', 'verified'

        ];

    public function platform() {
        return $this->hasOne(Platform::class, 'id', 'platform_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getTwitterDataAttribute($value = null) {
        return $value;
    }


    public static function numberFormat($number) {
        switch ($number) {
            case $number > 999999999:
                $format = number_format($number / 1000000000, 2) . 'B';
                break;
            case $number > 999999:
                $format = number_format($number / 1000000, 2) . 'M';
                break;
            case $number > 999:
                $format = number_format($number / 1000, 2) . 'K';
                break;

            default:
                $format = number_format($number);
                break;
        }

        return $format;
    }

    public function twitterData() {
        $profile = $this->fetchProfileData();

        if(!$profile || isset($profile->error)) return false;

        $er = $this->calculateER($profile);

        // $data['profile'] = $profile;
        // $data['er'] = $er;

        return $profile;
    }

    public function fetchProfileData() {
        try {
            $profile = $this->guzzleClient('users/show', ['screen_name' =>  $this->handle]);
        } catch (\Exception $e) {
            return false;
        }


        if(isset($profile->errors)) return false;

        return $profile;

    }

    public function checkExists($handle) {
        try {
            $profile = $this->guzzleClient('users/show', ['screen_name' =>  $handle]);
        } catch (\Exception $e) {
            return false;
        }


        if(isset($profile->error)) return false;

        return $profile;
    }

    public function calculateER($profileData) {
        $likes = 0;
        $retweets = 0;
        $er = 0;

        $obj = new \stdClass;
        $obj->avrLikes = 0;
        $obj->avrRetweets = 0;

        try {
            $tweets = $this->guzzleClient('statuses/user_timeline', ['screen_name' => $this->handle, 'count' => 100, 'exclude_replies' => true, 'include_rts' => false]);

            if($profileData) {
                if(count($tweets) > 0) {
                    foreach($tweets as $tweet) {
                        $retweets += $tweet->favorite_count ?? 0;
                        $likes += $tweet->retweet_count ?? 0;

                    }
                }


                $obj->avrLikes = $likes / 100;
                $obj->avrRetweets = ($retweets / 100 );


                $er = doubleval(((($likes + $retweets) / ($profileData->followers_count ?? 0))));

            }

            $obj->er = $er;

        } catch (\Exception $e) {
            return false;
        }


        return $obj;
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
