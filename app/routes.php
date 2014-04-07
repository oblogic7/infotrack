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

/*
|-----------------------------------
| Test Route
|-----------------------------------
*/

Route::get('test', function () {

});


/*
|-----------------------------------
| API Routes
|-----------------------------------
*/

Route::group(array('prefix' => 'v1'), function () {

	Route::resource('clients', 'ClientsController');
	Route::resource('clients.services', 'ClientServicesController');

	Route::resource('software', 'SoftwareTitlesController');
	Route::resource('software.licenses', 'SoftwareLicensesController');

	Route::resource('credentials', 'AuthDetailsController');
	Route::resource('credentials.type', 'AuthDetailTypesController', array('only' => array('show')));

	Route::resource('credentials/type', 'AuthDetailTypesController', array('except' => array('show')));

});