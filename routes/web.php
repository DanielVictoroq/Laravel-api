<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'login'], function() {
    Route::get('/', function(){
        return view('auth.login');
    });
    Route::post('/', 'Auth\LoginController@authenticate')->name('login');
});

Route::group(['prefix' => 'register'], function() {
    Route::get('/', function(){
        return view('auth.register');
    })->name('register');
    Route::post('/', 'Auth\LoginController@register')->name('register');
});

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout','HomeController@logout')->name('logout');
    Route::get('/jobsGet', 'BaseController@JobsGetAll');
});