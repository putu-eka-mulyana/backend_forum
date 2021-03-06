<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

use Illuminate\Http\Request;

Route::group(['middleware' => ['api']], function(){
    Route::post('/auth/signup','AuthController@signup');
    Route::post('/auth/signin','AuthController@signin');
    Route::get('/question','QuestionController@index');
    Route::get('/question/{id}','QuestionController@show');
    Route::get('/tag','TagController@index');

    Route::group(['middleware' => ['jwt.auth']], function(){
        Route::get('/profil','UserController@profil');
        Route::post('/question','QuestionController@store');
        Route::put('/question/{id}','QuestionController@update');
        Route::delete('/question/{id}','QuestionController@distroy');
        Route::post('/answers/{id}','AnswersController@store');
    });
});
