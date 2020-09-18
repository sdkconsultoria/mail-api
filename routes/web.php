<?php

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

$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function() use($router){
    $router->get('domain', 'DomainController@index');
    $router->post('domain', 'DomainController@create');
    $router->get('domain/{id}', 'DomainController@show');
    $router->put('domain/{id}', 'DomainController@update');
    $router->delete('domain/{id}', 'DomainController@destroy');

    $router->get('account', 'AccountController@index');
    $router->post('account', 'AccountController@create');
    $router->get('account/{id}', 'AccountController@show');
    $router->put('account/{id}', 'AccountController@update');
    $router->delete('account/{id}', 'AccountController@destroy');

    $router->get('alias', 'AliasController@index');
    $router->post('alias', 'AliasController@create');
    $router->get('alias/{id}', 'AliasController@show');
    $router->put('alias/{id}', 'AliasController@update');
    $router->delete('alias/{id}', 'AliasController@destroy');
});
