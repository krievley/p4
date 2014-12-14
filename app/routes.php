<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route to home.
Route::get('/', function()
{
	return View::make('home');
});

//Route for user authentication.
Route::controller('/auth', 'UserController');

//Route for all registered members.
Route::controller('/members', 'MembersController');

//Route to display each party using unique URL.
Route::get('/party/{website}', ['uses' => 'PartyController@getWebsite']);

//Route to process the response form.
Route::post('/party/response', ['uses' => 'PartyController@postResponse']);