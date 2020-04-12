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

$router->group(['prefix'=>'api/v1'],function ($router){

$router->group(['prefix'=>'posts','middleware'=>'auth'],function ($router){
    $router->post('add','PostController@createPost');
    $router->get('view/{id}','PostController@viewPost');
    $router->put('edit/{id}','PostController@updatePost');
    $router->delete('delete/{id}','PostController@deletePost');
    $router->get('index','PostController@index');
});

$router->group(['prefix'=>'users'],function ($router){
    $router->post('add','UsersController@add');
    $router->get('view/{id}','UsersController@view');
    $router->put('edit/{id}','UsersController@edit');
    $router->delete('delete/{id}','UsersController@delete');
    $router->get('index','UsersController@index');
});

});

