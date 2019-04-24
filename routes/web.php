<?php


Route::get('/','HomeController@index')->name('home');

Route::group(['prefix' => 'login'], function() {
    Route::get('/','Auth\LoginController@index')->name('login');
    Route::post('/', 'Auth\LoginController@authenticate')->name('login');
});

Route::group(['prefix' => 'register'], function() {
    Route::get('/', 'HomeController@registerGet')->name('register');
    Route::post('/post', 'UsuarioController@novo')->name('register/post');
});

Route::group(['prefix' => 'forgot-password'], function() {
    Route::get('/', 'HomeController@forgotGet')->name('forgot');
    Route::post('/', 'HomeController@forgot')->name('forgot');
});

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/predio', 'PredioController@index')->name('predio');
    Route::get('/ocorrencias', 'PredioController@indexOcorrencias')->name('ocorrencias');
    Route::get('/recados', 'PredioController@indexRecados')->name('recados');
});

Route::group(['middleware' => ['auth:admin']], function () { 
    Route::get('/home', 'HomeController@index')->name('homeadmin');
    Route::get('/sindico', 'UsuarioController@getSindico')->name('getSindico');
    Route::get('/logout-admin','Auth\LoginController@logout')->name('logoutAdmin');
    Route::post('/sindico-post', 'UsuarioController@definirSindico')->name('Postsindico');
});


Route::get('/logout','Auth\LoginController@logout')->name('logout');
