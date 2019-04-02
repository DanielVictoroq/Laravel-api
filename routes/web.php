<?php

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'login'], function() {
    Route::get('/','Auth\LoginController@index')->name('login');
    Route::post('/', 'Auth\LoginController@authenticate')->name('login');
});

Route::group(['prefix' => 'register'], function() {
    Route::get('/', 'Auth\LoginController@registerGet')->name('register');
    Route::post('/', 'Auth\LoginController@register')->name('register');
});

Route::group(['prefix' => 'forgot-password'], function() {
    Route::get('/', 'Auth\LoginController@forgotGet')->name('forgot');
    Route::post('/', 'Auth\LoginController@forgot')->name('forgot');
});

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/tabela', 'HomeController@tabelafu')->name('tabela');
    Route::get('/criar', 'HomeController@criarJob')->name('criarJob');
    Route::post('/job', 'HomeController@inserirJobs')->name('criarJob');
    Route::post('/excluir-job', 'HomeController@excluirJob')->name('excluirJob');
    Route::get('/logout','Auth\LoginController@logout')->name('logout');
    Route::get('/jobsGet', 'BaseController@JobsGetAll');
});