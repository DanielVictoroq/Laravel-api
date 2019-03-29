<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('home');
});

Route::group(['middleware' => ['api_token']], function () {   
    Route::resource('jobs', 'JobsController');
    Route::resource('companies', 'CompaniesController');
});
