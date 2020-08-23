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


Route::middleware('guest')->group(function () {
    
    Route::get('login', 'AuthController@login')->name('login');
    
    Route::get('login/google', 'AuthController@redirectToProvider')->name('login.google');
    Route::get('login/google/callback', 'AuthController@handleProviderCallback');
});

Route::middleware('auth')->group(function () {
    Route::get('/bbn', 'BBN\BBNController@showReport')->name('bbn');

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
    Route::get('home', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

    Route::prefix('auth')->group(function () {
        Route::get('login', 'Admin\AuthController@login')->name('admin.login');
        Route::post('login', 'Admin\AuthController@postLogin')->name('admin.login.post');

        Route::get('logout', 'Admin\AuthController@logout')->name('admin.logout');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard',  'Admin\AuthController@dashboard')->name('admin.dashboard');

        Route::get('profiles',  'Admin\AccountController@list')->name('admin.profiles');
        Route::get('profiles/add',  'Admin\AccountController@add')->name('admin.profile.add');
        Route::post('profile/add',  'Admin\AccountController@store')->name('admin.profile.add.post');
        Route::get('profile/delete/{id}',  'Admin\AccountController@delete')->name('admin.profile.delete');
        Route::get('profile/edit/{id}',  'Admin\AccountController@edit')->name('admin.profile.edit');
        Route::post('profile/edit/{id}',  'Admin\AccountController@update')->name('admin.profile.edit.post');

        Route::get('keywords',  'Admin\KeywordController@list')->name('admin.keywords');
        Route::get('keywords/add',  'Admin\KeywordController@add')->name('admin.keywords.add');
        Route::post('keywords/add',  'Admin\KeywordController@store')->name('admin.keywords.add.post');


        Route::get('categories',  'Admin\CategoryController@list')->name('admin.categories');
        Route::get('categories/add',  'Admin\CategoryController@add')->name('admin.categories.add');
        Route::post('categories/add',  'Admin\CategoryController@store')->name('admin.categories.add.post');
        Route::get('categories/edit/{id}',  'Admin\CategoryController@edit')->name('admin.categories.edit');
        Route::post('categories/edit/{id}',  'Admin\CategoryController@update')->name('admin.categories.edit.post');
    });
});
