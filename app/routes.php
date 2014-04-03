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
| Test Routes
|-----------------------------------
*/

Route::get('test', function() {

//	$test = \YA\Services\Hosting\HostingService::create(['name' => 'Test']);
//	$test2 = \YA\Services\Hosting\DomainService::create(['url' => 'http://test.com']);
//
//	print_r($test->name);
//	print_r($test2->url);

	return YA\Services\Billing\BillableService::all();

//	$test->destroy($test->id);
});

/*
|-----------------------------------
| Endpoint Mapping
|-----------------------------------
*/

/*
| CLIENTS
|
| /clients
| /clients/{client_id}
| /clients/{client_id}/services
| /clients/{client_id}/services/{service_id}
| /clients/{client_id}/contacts
| /clients/{client_id}/contacts/{contact_id}
| /clients/{client_id}/credentials
*/

Route::resource('clients', 'ClientsController');
Route::resource('clients.services', 'ClientServicesController');

/*
 *
 * SOFTWARE
 *
 * /software
 * /software/{\}
 * /software/{software_title_id}/licenses
 *
 */

Route::resource('software', 'SoftwareTitlesController');
Route::resource('software.licenses', 'SoftwareLicensesController');

/*
 *
 * CREDENTIALS
 *
 * /credentials
 * /credentials/{auth_detail_id}
 * /credentials/{auth_detail_id}/type/{type_id}
 *
 */

Route::resource('credentials', 'AuthDetailsController');
Route::resource('credentials.type', 'AuthDetailTypesController', array('only' => array('show')));

/*
 * CREDENTIAL TYPES
 * /credentials/type
 * /credentials/type/{type_id)
 *
 */

Route::resource('credentials/type', 'AuthDetailTypesController', array('except' => array('show')));
