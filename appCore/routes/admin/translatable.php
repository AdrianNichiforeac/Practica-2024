<?php
use Illuminate\Support\Facades\Route;

Route::get('/translate', 'Admin\TranslatableController@index')->name('translate.index');
Route::get('/translate/create', 'Admin\TranslatableController@create')->name('translate.create');
Route::put('/translate/insert', 'Admin\TranslatableController@insert')->name('translate.insert');
Route::put('/translate/{constantes}/update', 'Admin\TranslatableController@update')->name('translate.update');
Route::delete('/translate/{constantes}/destroy', 'Admin\TranslatableController@destroy')->name('translate.destroy');
