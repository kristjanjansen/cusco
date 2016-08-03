<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FrontpageController@index');


Route::get('/styleguide', 'StyleguideController@index');

Route::post('/styleguide/formdemo', 'StyleguideController@formdemo');


Route::get('/content/forum', 'ForumController@index');

Route::get('/content/forum/{id}', 'ForumController@show');


Route::get('/content/news/{id}', 'NewsController@show');



Route::get('/image/index', 'ImageController@index');

Route::post('/image/store', 'ImageController@store');


Route::get('/promo', 'PromoController@getRandom');


Route::post('/render', 'HelpersController@render');

Route::get('/test', 'TestController@index');

Route::get('/flag/toggle/{flagType}', function ($flagtype) {
    
    if ($flagType == 'good' && Request::has('value')) {
        $value = Request::get('value');
        return Response::json([
            'value' => $value++
        ]);
    }
    
    if ($flagType == 'good' && Request::has('value')) {
        $value = Request::get('value');
        return Response::json([
            'value' => $value > 0 ? $value-- : $value
        ]);
    }

    return abort(404);

});
