<?php

Route::get('/', 'FrontpageController@index');


Route::get('/styleguide', 'StyleguideController@index');

Route::post('/styleguide/formdemo', 'StyleguideController@formDemo');


Route::get('/content/forum', 'ForumController@index');

Route::get('/content/forum/{id}', 'ForumController@show');


Route::get('/content/news/{id}', 'NewsController@show');



Route::get('/image/index', 'ImageController@index');

Route::post('/image/store', 'ImageController@store');


Route::get('/promo', 'PromoController@getRandom');


Route::post('/render', 'HelpersController@render');

Route::get('/test', 'TestController@index');
