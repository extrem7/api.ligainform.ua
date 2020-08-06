<?php

Route::get('/home', 'PagesController@home');

Route::get('/posts', 'PostsController@index');

Route::get('/posts/search', 'PostsController@search');

Route::get('/categories', 'CategoriesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/politics', 'PagesController@politics');

Route::fallback('PagesController@notFound');
