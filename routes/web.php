<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'login'], function() {
    Route::get('/','Auth\LoginController@index');
    Route::post('/', 'Auth\LoginController@authenticate')->name('login');
});

Route::group(['prefix' => 'register'], function() {
    Route::get('/', 'Auth\LoginController@registerGet')->name('register');
    Route::post('/', 'Auth\LoginController@register')->name('register');
});

Route::group(['prefix' => 'forgot-password'], function() {
    Route::get('/', 'Auth\LoginController@forgotGet')->name('register');
    Route::post('/', 'Auth\LoginController@forgot')->name('register');
});

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout','Auth\LoginController@logout')->name('logout');
    Route::get('/jobsGet', 'BaseController@JobsGetAll');
});