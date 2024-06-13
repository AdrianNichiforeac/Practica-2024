<?php
use Illuminate\Support\Facades\Route;

Route::get('/gallery', 'Admin\GalleryPostController@index')->name('gallery_posts.index');
Route::post('/gallery', 'Admin\GalleryPostController@store')->name('gallery_posts.store');
Route::get('/gallery/{galleryPost}/edit', 'Admin\GalleryPostController@edit')->name('gallery_posts.edit');
Route::put('/gallery/update', 'Admin\GalleryPostController@update')->name('gallery_posts.update');
Route::delete('/gallery/{galleryPost}/destroy', 'Admin\GalleryPostController@destroy')->name('gallery_posts.destroy');
Route::get('/gallery/{galleryPost}/status/{feat}', 'Admin\GalleryPostController@changeStatus')->name('gallery_posts.change_status' );


//Ajax request
Route::post('/gallery/{galleryPost}/store_image_general', 'Admin\GalleryPostController@storeImageGeneral')->name('gallery_posts.store_image_general');
