<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Auth::routes(['register' => false]);
    Route::group(['middleware' => 'auth'], function () {
        // Home Page View
        Route::get('home', 'HomeController@index')->name('home');
        // User CRUD Routes
        Route::resource('users', 'UserController')->except('show');
        Route::get('profile/edit/{id}', 'UserController@editProfile')->name('editProfile');
        Route::post('profile/update/{id}', 'UserController@updateProfile')->name('updateProfile');
        // Categories CRUD Routes
        // Route::resource('categories', 'CategoryController')->except('show');
        // Categories CRUD Routes
        Route::resource('leagues', 'LeagueController')->except('show');
        // Matches CRUD Routes
        Route::resource('matches', 'MatchController')->except('show');
        // Videos CRUD Routes
        Route::resource('videos', 'VideoController')->except('show');
        // Article CRUD Routes
        Route::resource('articles', 'ArticleController')->except('show');
        // Banner CRUD Routes
        Route::resource('banners', 'BannerController')->except('show');

        Route::get('settings/edit/{id}', 'SettingController@edit')->name('settings.edit');
        Route::post('settings/update/{id}', 'SettingController@update')->name('settings.update');
    });
});

