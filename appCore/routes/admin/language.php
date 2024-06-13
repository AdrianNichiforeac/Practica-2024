<?php
use Illuminate\Support\Facades\Route;

Route::get('/language', 'Admin\LanguageController@index')->name('language.index');
Route::post('/language', 'Admin\LanguageController@store')->name('language.store');
Route::put('/language/{language}/update', 'Admin\LanguageController@update')->name('language.update');
Route::delete('/language/{language}/destroy', 'Admin\LanguageController@destroy')->name('language.destroy');
