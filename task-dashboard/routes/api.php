<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api routes here  under namespace Api
Route::namespace('Api')->group(function(){
    //news
    Route::get('/news/show','newsController@show');
    Route::post('/news/showOne','newsController@showOne');

    //patients
    Route::get('/patients/show','PatientsController@show');
    Route::post('/patients/showOne','PatientsController@showOne');

});
