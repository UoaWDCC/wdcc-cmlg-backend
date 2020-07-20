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


//route is prepended with /api/ prefix
Route::get('/translations/{word?}', 'WordController@show');

// route below is only used to set up the database, this shouldn't be exposed to the public
//Route::get('/import', 'ImportController@store');

