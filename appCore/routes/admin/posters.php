<?php
use Illuminate\Support\Facades\Route;

Route::get('/posters', 'Admin\PosterController@index')->name('posters.index');
Route::post('/posters', 'Admin\PosterController@store')->name('posters.store');
Route::get('/posters/{poster}/edit', 'Admin\PosterController@edit')->name('posters.edit');
Route::put('/posters/update', 'Admin\PosterController@update')->name('posters.update');
Route::delete('/posters/{poster}/destroy', 'Admin\PosterController@destroy')->name('posters.destroy');
Route::get('/posters/{poster}/status/{feat}', 'Admin\PosterController@changeStatus')->name('posters.changeStatus' );

//Ajax request
Route::post('/posters/{poster}/storeImageGeneral', 'Admin\PosterController@storeImageGeneral')->name('posters.storeImageGeneral');
