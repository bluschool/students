<?php

use Illuminate\Routing\Router;
use Orchestra\Support\Facades\Foundation;

/*
|--------------------------------------------------------------------------
| Frontend Routing
|--------------------------------------------------------------------------
*/

Foundation::group('bluschool/dashboard', 'dashboard', ['namespace' => 'Bluschool\Dashboard\Http\Controllers'], function (Router $router) {

    $router->post('printing/pdf/batch', 'PrintingController@batchPrinting');
    $router->get('printing/pdf/{id}', 'PrintingController@pdf');
    $router->get('printing/{id}', 'PrintingController@show');
    $router->get('printing', 'PrintingController@index');

    $router->post('member/registration', 'HostController@store');
    $router->get('member/registration', 'HostController@create');
    $router->get('member', 'HostController@index');
    $router->get('/', 'HomeController@index');
});

/*
|--------------------------------------------------------------------------
| Backend Routing
|--------------------------------------------------------------------------
*/

Foundation::namespaced('Bluschool\Dashboard\Http\Controllers\Admin', function (Router $router) {
    $router->group(['prefix' => 'Dashboard'], function (Router $router) {
        $router->get('/', 'HomeController@index');
        $router->match(['GET', 'HEAD', 'DELETE'], 'profile/{roles}/delete', 'HomeController@delete');

    });
});
