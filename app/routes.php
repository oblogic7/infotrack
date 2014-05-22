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

Route::get(
    'test',
    function () {

    }
);

Route::get(
    '/login',
    function () {
        return View::make(
            'pages.login',
            array(
                'authUrl' => Auth::getAuthUrl()
            )
        );
    }
);

Route::group(
    array('before' => array('google-finish-authentication', 'auth')),
    function () {
        Route::get(
            '/',
            function () {
                return View::make('pages.home');
            }
        );
    }
);

Route::resource('clients', 'ClientsController');
Route::resource('clients.services', 'ClientServicesController');
Route::resource('clients.contacts', 'ClientContactsController');
Route::resource('clients.auth', 'ClientAuthDetailsController');

Route::resource('software', 'SoftwareTitlesController');
Route::resource('software.licenses', 'SoftwareLicensesController');

Route::resource('credentials', 'AuthDetailsController');
Route::resource('credentials.type', 'AuthDetailTypesController', array('only' => array('show')));

Route::resource('credentials/type', 'AuthDetailTypesController', array('except' => array('show')));

