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

Route::get('/', 'HomeController@showWelcome');

Route::group(array(
		'prefix' => 'experiment'
	), function(){
		Route::get('/', 'ApiController@base');
		Route::get('/config', 'ApiController@config');
		Route::get('/start', 'ApiController@startExperiment');
		Route::post('/run/{id}', 'ApiController@runExperiment');
		Route::get('/results/{id}', 'ApiController@getExperimentResults');
});
