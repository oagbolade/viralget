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
Route::get('/cleandb', 'Cronjobs\DatabaseCleaner\DatabaseCleaner@index');
Route::get('/summary/scheduler', 'Cronjobs\summary\SummaryController@checkSchedule');
Route::get('/bbn/data', 'BBN\BBNDataController@getHashtagTweets'); // BBN Data
Route::get('/bbn/influencerdata/{handle}', 'BBN\BBNDataController@getAllProfileData'); // BBN Influencer Data
Route::post('/trafficdata', 'ApiV1\TrafficDataController@saveTrafficData');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'adminv1', 'namespace' => 'ApiV1\Admin'], function() {
    // Login
    Route::post('/admin/login', 'AuthController@login');
    Route::post('/admin/create', 'AuthController@createAdmin');
    Route::get('/admin/logout', 'AuthController@logout');
    Route::get('/admin/user', 'AuthController@getAdminCredentials');

    Route::get('/user/subscription', 'UsersController@getSubscriptions');

    Route::get('/traffic/chart', 'ChartController@lineChart');
    Route::get('/traffic/filter/{hours}/{month}/{year}', 'ChartController@filterLineChart');
    Route::get('/traffic/all', 'UsersController@getAllTrafficData');

});

Route::group(['prefix' => 'v1', 'namespace' => 'ApiV1'], function() {
    Route::get('/influencers/{category}', 'InfluencerController@getAllInfluencers');

    Route::get('/profile', 'TwitterAPIController@getAllProfileData');
    Route::get('/hashtag', 'TwitterAPIController@getHashtagTweets');

    Route::get('/management/profile/summary', 'ManagementTwitterAPIController@getCampaignSummary');
    Route::get('/management/profile', 'ManagementTwitterAPIController@getAllProfileData');
    Route::get('/management/hashtag', 'ManagementTwitterAPIController@getHashtagTweets');

    // Download invoice
    Route::get('/management/invoice/{name}/{company_name}/{campaign_objective}/{booking_type}/{user_query}/{plan_name}/{amount}', 'ManagementInvoiceController@show');


    Route::get('/trends', 'TwitterAPIController@trending');
    Route::get('/list', 'SearchController@list');
    Route::get('/list/filter', 'SearchPageController@list');
    Route::get('/list/queryProfile', 'SearchController@profile');

    Route::get('/misc/categories', 'SearchController@getCategories');
    Route::get('/misc/categories/filter', 'SearchController@getFilterCategories');
    Route::get('/misc/states', 'SearchController@getStates');

    Route::get('/management/report/hashtag/{id}', 'ManagementShowDataController@showReportingHistory');
    Route::get('/management/report/profile/{id}', 'ManagementShowDataController@showProfilingHistory');
    Route::get('/management/report/profile/summary/{id}', 'ManagementShowDataController@showSummaryHistory');

    Route::get('/report/hashtag/{id}', 'ShowDataController@showReportingHistory');
    Route::get('/report/profile/{id}', 'ShowDataController@showProfilingHistory');

    Route::post('/campaign/create', 'CampaignController@create');
    Route::get('/campaign/profiling', 'CampaignController@profiling');
    Route::get('/campaign/reporting', 'CampaignController@reporting');
    Route::get('/campaign/subscription', 'CampaignController@subscription');
    Route::delete('/campaign/delete/{campaignId}', 'CampaignController@delete');
    Route::delete('/management/campaign/trends/delete/{campaignId}', 'CampaignController@deleteTrendsManagement');
    Route::delete('/management/campaign/influencers/delete/{campaignId}', 'CampaignController@deleteInfluencerManagement');
    Route::get('/management/campaign/update/{campaignId}', 'CampaignController@updateInfluencerManagement');

    Route::get('/campaign/management/view', 'CampaignController@managementView');
    Route::get('/campaign/trends/view', 'CampaignController@trendsView');

    Route::post('/report/keyword/download', 'ReportPDFController@downloadKeywordReport');
    Route::post('/report/profiling/download', 'ReportPDFController@downloadProfilingReport');
});
