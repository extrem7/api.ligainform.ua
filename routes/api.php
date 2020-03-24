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

Route::get('/posts', 'PostsController@index');

Route::get('/posts/search', 'PostsController@search');

Route::get('/categories', 'CategoriesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/politics', 'PagesController@politics');

Route::fallback('PagesController@notFound');
