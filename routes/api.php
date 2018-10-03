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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('/registration', 'AuthController@newUserWizard');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');


Route::get('/', 'ApiProposalController@index');
Route::get('/show-my-proposals', 'ApiProposalController@showMyProposals');
Route::get('/show/{id}', 'ApiProposalController@show');
Route::post('/create', 'ApiProposalController@create');
Route::put('/update/{id}', 'ApiProposalController@update');
Route::post('/delete/{id}', 'ApiProposalController@delete');
