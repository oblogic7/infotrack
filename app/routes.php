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
    '/login',
    [
        'as' => 'login',
        function () {
            return View::make(
                'pages.login',
                array(
                    'authUrl' => '/google/authorize'
                )
            );
        }
    ]
);



/**
 * Secure Routes
 */

Route::group(

    array('before' => array('auth')),
    function () {
        Route::get(
            'test',
            function () {

            }
        );
        Route::get(
            '/',
            function () {
                return View::make('pages.home');
            }
        );

        Route::get(
            '/logout',
            [
                'as' => 'logout',
                function () {
                    Auth::logout();

                    return Redirect::to('/');
                }
            ]
        );

        Route::resource('clients', 'ClientsController');
        Route::resource('clients.services', 'ClientServicesController');
        Route::resource('clients.contacts', 'ClientContactsController');
        Route::resource('clients.auth', 'ClientAuthDetailsController');
        Route::resource('clients.activity', 'ClientActivityLogController');

        Route::resource('software', 'SoftwareTitlesController');
        Route::resource('software.licenses', 'SoftwareLicensesController');

        Route::resource('credentials', 'AuthDetailsController');
        Route::resource('credentials.type', 'AuthDetailTypesController', array('only' => array('show')));

        Route::resource('credentials/type', 'AuthDetailTypesController', array('except' => array('show')));

        Route::get('typeahead/clients', 'TypeAheadController@clients');
        Route::get('typeahead/auth', 'TypeAheadController@auth');
    }
);

Route::group(
    ['prefix' => 'google'],
    function () {

        Route::get(
            'authorize',
            function () {
                return OAuth::authorize('google');
            }
        );

        Route::get(
            'login',
            function () {
                try {
                    OAuth::login(
                        'google',
                        function ($user, $details) {
                            $user->email = $details->nickname;
                            $user->name = $details->firstName . ' ' . $details->lastName;
                            $user->given_name = $details->firstName;
                            $user->family_name = $details->lastName;
                            $user->profile_image = $details->imageUrl;
                            $user->save();
                        }
                    );
                } catch (ApplicationRejectedException $e) {
                    // User rejected application
                } catch (InvalidAuthorizationCodeException $e) {
                    // Authorization was attempted with invalid
                    // code,likely forgery attempt
                }

                // Current user is now available via Auth facade
                $user = Auth::user();

                return Redirect::intended();
            }
        );
    }
);


