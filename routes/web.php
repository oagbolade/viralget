<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/marketing', 'HomeController@marketing')->name('marketing');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');
Route::get('/pricing/trends', 'HomeController@trends')->name('pricing.trends');
Route::get('/pricing/management', 'HomeController@management')->name('pricing.management');
Route::get('/what-we-do', 'HomeController@whatwedo')->name('what-we-do');
Route::get('/team', 'HomeController@team')->name('team');
Route::get('/faqs', 'HomeController@faqs')->name('faqs');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy');
Route::get('/search', 'SearchController@search')->name('search');
Route::get('/bbn', 'BBN\BBNController@showReport')->name('bbn');

Route::middleware('guest')->group(function () {
    
    Route::get('login', 'AuthController@login')->name('login');
    
    Route::get('login/google', 'AuthController@redirectToProvider')->name('login.google');
    Route::get('login/google/callback', 'AuthController@handleProviderCallback');
});

Route::middleware('auth')->group(function () {
    Route::get('/download-pdf', 'ReportPDFController@download')->name('download-pdf');

    Route::get('/search-page', 'SearchController@index')->name('search-page');
    Route::get('complete-signup', 'AuthController@signup')->name('login.signup');
    Route::post('complete-signup', 'AuthController@postSignup')->name('login.signup.post');
    
    Route::get('signup/{bookingType}', 'ManagementsController@managementSignup')->name('managements.signup');
    Route::post('complete-signup/{bookingType}', 'ManagementsController@submitDetails')->name('signup.post.managements');
    Route::get('checkout/{bookingType}/{plan}', 'ManagementsController@checkout')->name('management.checkout');

    Route::get('/history/reports', 'DashboardController@reporting')->name('reporting');
    Route::get('/history/profiles', 'DashboardController@profiling')->name('profiling');

    Route::get('/subscribe/{plan}', 'SubscriptionController@subscribe')->name('subscribe');
    Route::get('/subscribe/confirm/{reference}', 'SubscriptionController@verifySubscription')->name('subscribe.confirm');

    Route::get('/subscribe/management/confirm/{email}/{user_plan_id}/{reference}', 'ManagementSubscriptionController@verifySubscription')->name('subscribe.confirm');

    Route::get('/management/hashtag', 'ManagementSearchController@hashtag')->name('profiles.hashtag');
    Route::get('/management/profile', 'ManagementSearchController@profile')->name('profiles.profiling');

    Route::get('/search/profiles', 'SearchController@list')->name('profiles');
    Route::get('/search/profiles/{category}', 'SearchController@list')->name('profiles.category');
    Route::get('/search/profile/{handle}', 'SearchController@showProfile')->name('profile.show');
    Route::get('/hashtag/{q}', 'SearchController@showHashtag')->name('search.show');

    Route::get('/management/report/hashtag/{id}', 'ManagementReportingController@index')->name('reporting.hashtag');
    Route::get('/management/report/profile/{id}', 'ManagementReportingController@profile')->name('reporting.profile');
    Route::get('/management/report/profile/summary/{id}', 'ManagementReportingController@profilingSummary')->name('reporting.profile');

    Route::get('/report/hashtag/{id}', 'ReportingController@index')->name('reporting.hashtag');
    Route::get('/report/profile/{id}', 'ProfilingController@index')->name('reporting.profile');
    
    Route::get('/campaigns', 'CampaignController@index')->name('campaigns.view');
    Route::get('/campaigns/trends', 'CampaignController@trends')->name('campaigns.trends');
    Route::get('/campaigns/influencermanagement', 'CampaignController@influencerManagement')->name('campaigns.influencermanagement');
    Route::get('/create-campaign', 'CampaignController@create')->name('campaigns.create');

    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::prefix('admin')->group(function () {
    Route::get('login', 'Admin\LoginController@showLogin')->name('admin.login');
    
    Route::middleware(['jwt.verify'])->group(function () {
        Route::get('dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
        Route::get('users/subscription', 'Admin\DashboardController@userSubscription')->name('admin.subscription');
        Route::get('users/influencermanagment', 'Admin\DashboardController@dashboard')->name('admin.influencermanagment');
        Route::get('users/trends', 'Admin\DashboardController@dashboard')->name('admin.trends');
        Route::get('manage', 'Admin\DashboardController@dashboard')->name('admin.manage');
        Route::get('password', 'Admin\DashboardController@dashboard')->name('admin.password');
    });
});
