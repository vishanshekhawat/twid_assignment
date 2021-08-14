<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('import',  ['uses' => 'PinCodeController@import']);
$router->post('upload',  ['uses' => 'PinCodeController@upload']);
$router->get('pincodes',  ['uses' => 'PinCodeController@index']);
$router->get('import_from_url',  ['uses' => 'PinCodeController@importDataFromUrl']);
//
//$router->group(['prefix' => 'api'], function () use ($router) {
//   //  $router->get('pincodes',  ['uses' => 'PinCodeController@pincodes']);
//   // $router->post('pincodes',  ['uses' => 'PinCodeController@pincodes']);
//});

$router->group(['prefix' => 'api', 'namespace' => 'Api'], function () use ($router) {
    $router->get('pincodes',  ['uses' => 'PinCodesController@index']);
//    $router->post('pincodes',  ['uses' => 'PinCodeController@pincodes']);
});

