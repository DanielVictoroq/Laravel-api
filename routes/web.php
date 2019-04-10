<?php

Route::get('/',function(){
    if(Auth::guard('admin')->check() ){
       return redirect()->route('home');
    }
    else{
        return view('home');
    }
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

Route::group(['middleware' => ['auth:admin']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/tabela-admin', 'HomeController@tabelafu')->name('tabelaAdmin');
    Route::get('/criar', 'HomeController@criarJob')->name('criarJob');
    Route::post('/job', 'HomeController@inserirJobs')->name('criarJobPost');
    Route::post('/excluir-job', 'HomeController@excluirJob')->name('excluirJob');
    Route::get('/logout-admin','Auth\LoginController@logout')->name('logoutAdmin');
    Route::get('/jobsGet', 'BaseController@JobsGetAll');
    Route::get('/admin-reg', 'Auth\Admin\AdminController@indexLogin')->name('adminRegister');
    Route::post('/admin-reg', 'Auth\Admin\AdminController@register')->name('adminRegister');
    Route::get('/register-user', 'Auth\Admin\AdminController@registerGet')->name('registerUser');
    Route::post('/register-user', 'Auth\Admin\AdminController@registerUser')->name('registerUSer');
});

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/tabela', 'HomeController@tabelafu')->name('tabela');
});


Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/usuarios','Auth\Admin\AdminController@retornoUsuarios');
