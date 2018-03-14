<?php

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

use Dingo\Api\Routing\Router;

/* @var Router $api */
$api = app(Router::class);

$api->version(config('api.version'), ['namespace' => 'App\Http\Controllers\Api\v1'], function (Router $api) {

    $api->post('auth', 'AuthApiController@login');
    $api->put('auth', 'AuthApiController@refreshToken');
    $api->delete('auth', 'AuthApiController@logout')->middleware('api.auth');

    $api->post('auth/password/reset', 'ForgotPasswordApiController@sendResetLinkEmail');
    $api->put('auth/password/reset', 'ResetPasswordApiController@reset');

    $api->group(['prefix' => 'dictionaries'], function (Router $api) {

        // Body types
        $api->get('body-types', 'BodyTypesController@getBodyTypesForSelection');

        // Car make
        $api->get('makes', 'MakesController@getMakesForSelection');

        // Car models
        $api->get('makes/{id}/models', 'CarModelsController@getModelsForSelection')->where('id', '\d+');

        // Car model years
        $api->get('models/{id}/years', 'YearsController@getYearsForSelection')->where('id', '\d+');

        // Trims
        $api->get('years/{id}/trims', 'TrimsController@getTrimsForSelection')->where('id', '\d+');
    });
});