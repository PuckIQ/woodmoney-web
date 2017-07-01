<?php

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
    return view('pages.index');
});

Route::get('/teams/{team}', 'PuckIQAPI\TeamController@run');
Route::get('/players/{player}', 'PuckIQAPI\PlayerController@run');
Route::get('/wowy/{player}', 'PuckIQAPI\WowyController@run');
Route::get('/search', 'PuckIQAPI\CustomSearchController@run');
Route::post('/playerSearch', 'PuckIQAPI\CustomSearchController@search');
Route::get('about', function () {
    return view('pages.about');
});