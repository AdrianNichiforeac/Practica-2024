<?php
use Illuminate\Support\Facades\Route;

Route::get('/news', 'Admin\NewsController@index')->name('news.index');
Route::post('/news', 'Admin\NewsController@store')->name('news.store');
Route::get('/news/{news}/edit', 'Admin\NewsController@edit')->name('news.edit');
Route::put('/news/update', 'Admin\NewsController@update')->name('news.update');
Route::delete('/news/{news}/destroy', 'Admin\NewsController@destroy')->name('news.destroy');
Route::get('/news/{news}/status/{feat}', 'Admin\NewsController@changeStatus')->name('news.change_status' );
//Ajax request
Route::post('/news/{news}/store_image_general', 'Admin\NewsController@storeImageGeneral')->name('news.store_image_general');
