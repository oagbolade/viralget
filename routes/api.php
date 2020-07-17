<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('cronjob/{platform}/{category}', 'Cronjobs\TwitterCronHandler@index');
Route::get('/cleandb', 'Cronjobs\DatabaseCleaner@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'ApiV1'], function() {
    Route::get('/influencers/{category}', 'InfluencerController@getAllInfluencers');

    Route::get('/profile', 'TwitterAPIController@getAllProfileData');
    Route::get('/hashtag', 'TwitterAPIController@getHashtagTweets');

    Route::get('/trends', 'TwitterAPIController@trending');
    Route::get('/list', 'SearchController@list');
    Route::get('/list/filter', 'SearchPageController@list');
    Route::get('/list/queryProfile', 'SearchController@profile');

    Route::get('/misc/categories', 'SearchController@getCategories');
    Route::get('/misc/categories/filter', 'SearchController@getFilterCategories');
    Route::get('/misc/states', 'SearchController@getStates');

    Route::get('/report/hashtag/{id}', 'ShowDataController@showReportingHistory');
    Route::get('/report/profile/{id}', 'ShowDataController@showProfilingHistory');

    Route::post('/campaign/create', 'CampaignController@create');
    Route::get('/campaign/view', 'CampaignController@view');
    Route::delete('/campaign/delete/{campaignId}', 'CampaignController@delete');

    Route::get('/campaign/management/view', 'CampaignController@managementView');
    Route::get('/campaign/trends/view', 'CampaignController@trendsView');

    Route::post('/report/keyword/download', 'ReportPDFController@downloadKeywordReport');
    Route::post('/report/profiling/download', 'ReportPDFController@downloadProfilingReport');
});
