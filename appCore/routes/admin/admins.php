<?php
use Illuminate\Support\Facades\Route;

Route::get('/admins', 'Admin\AdminController@index')->name('admins.index');

Route::post('/admins', 'Admin\AdminController@store')->name('admins.store');
Route::put('/admins/{admin}/update', 'Admin\AdminController@update')->name('admins.update');
Route::delete('/admins/{admin}/destroy', 'Admin\AdminController@destroy')->name('admins.destroy');

Route::get('/admins/{admin}/status/{feat}', 'Admin\AdminController@changeStatus')->name('admins.change_status');

