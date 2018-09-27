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
    return view('welcome');
});

Auth::routes();


/* Admin */
Route::get('/admin', 'Admin\HomeController@index');

Route::get('/admin/influencers', 'Admin\InfluencersController@index');
Route::get('/admin/influencers/list', 'Admin\InfluencersController@list');
Route::get('/admin/influencers/create', 'Admin\InfluencersController@create');
Route::post('/admin/influencers', 'Admin\InfluencersController@store');


Route::get('/admin/influencers/{influencer}/tweets', 'Admin\TweetsController@index');
Route::get('/admin/influencers/{influencer}/tweets/list', 'Admin\TweetsController@list');
/* Fin Admin */


