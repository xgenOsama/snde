<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('users/my', ['as' => 'users.my', 'uses' => 'Api\UserApiController@my']);
    Route::post('users/update', ['as' => 'users.update', 'uses' => 'Api\UserApiController@update']);
});

Route::get('/auth/refresh', ['as' => 'auth.refresh', 'uses' => 'Api\AuthApiController@refresh']);
Route::post('/register', ['as' => 'auth.register', 'uses' => 'Api\UserApiController@register']);
Route::post('/login', ['as' => 'auth.login', 'uses' => 'Api\UserApiController@login']);




