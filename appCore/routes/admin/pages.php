<?php
use Illuminate\Support\Facades\Route;

Route::get('/pages', 'Admin\PageController@index')->name('pages.index');
Route::post('/pages', 'Admin\PageController@store')->name('pages.store');
Route::get('/pages/{page}/edit', 'Admin\PageController@edit')->name('pages.edit');
Route::put('/pages/update', 'Admin\PageController@update')->name('pages.update');
Route::delete('/pages/{page}/destroy', 'Admin\PageController@destroy')->name('pages.destroy');

Route::get('/pages/{page}/first_menu/{feat}', 'Admin\PageController@setFirstMenu')->name('pages.setFirstMenu');
Route::get('/pages/{page}/second_menu/{feat}', 'Admin\PageController@setSecondMenu')->name('pages.setSecondMenu');

//AjaxRequest
Route::put('/pages/order_pages/', 'Admin\PageController@orderPages')->name('pages.orderPages');

//Ajax requests images
Route::post('/pages/{page}/store_image_general', 'Admin\PageController@storeImageGeneral')->name('pages.store_image_general');
Route::delete('/pages/{page}/destroy_image', 'Admin\PageController@destroyImage')->name('pages.destroy_image');

//Ajax requests files
Route::get('/pages/{page}/files', 'Admin\PageController@files')->name('pages.files');
Route::post('/pages/{page}/store_image', 'Admin\PageController@storeFile')->name('pages.store_file');
Route::delete('/pages/{page}/destroy_image', 'Admin\PageController@destroyFile')->name('pages.destroy_file');
