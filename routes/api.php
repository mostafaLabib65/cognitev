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

Route::post("/insert","campaignController@store");
Route::get("/campaigns","campaignController@index");
Route::get("/campaigns/{id}","campaignController@show");
Route::put("/campaigns/{id}","campaignController@put");
Route::patch("/campaigns/{id}","campaignController@patch");
Route::delete("/campaigns/{id}","campaignController@destroy");

Route::get("/analyze","campaignController@analyze");
