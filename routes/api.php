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

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/user-list', 'Api\ProfileController@getList');
Route::middleware('api')->get('/user/{uid}/profile', 'Api\ProfileController@getProfile');
Route::middleware('api')->post('/user/{uid}/save', 'Api\ProfileController@postSave');
//Route::middleware('auth:api')->post('/post-save', 'Api\PostsController@postSave');
