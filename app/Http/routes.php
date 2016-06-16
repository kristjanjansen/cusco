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

Route::get('/', function() {
    return collect([
        '/styleguide',
        '/content/forum',
        '/content/forum/1'
    ])->map(function($link) {
        return "<a href=\"$link\" style=\"display: block; color: #777; padding: 5px; font-family: monospace;\">$link</a>";
    })->implode('');
});

Route::get('/styleguide', 'StyleguideController@index');

Route::get('/promo', 'PromoController@getRandom');

Route::get('/content/forum', 'ForumController@index');

Route::get('/content/forum/{id}', 'ForumController@show');

Route::post('/render', function() {

    return Response::json([
        'body' => Markdown::convertToHtml(Request::input('body'))
    ]);

});
