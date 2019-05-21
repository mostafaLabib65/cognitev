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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("/","campaignController");
Route::get("/analyze","campaignController@analyze");
Route::get("/{id}", "campaignController@show");
Route::delete("/{id}", "campaignController@destroy");
Route::put("/{id}", "campaignController@put");
Route::patch("/{id}", "campaignController@patch");
