<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/translations/{word}', 'WordController@show');

// route below is only used to set up the database, this shouldn't be exposed to the public 
//Route::get('/import', 'ImportController@store');

// '/translations'
// '/translations/{word}'

//Potential json file
// 'english': {
//     words: {
//         [
//             id:1,
//             name:hi,
//             translation_id: 1
//         ]
//     }
// }
