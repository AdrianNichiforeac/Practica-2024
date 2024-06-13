<?php
use Illuminate\Support\Facades\Route;
Route::get('/images/{parent_id}/{imageable_type}/gallery', 'Admin\ImageController@gallery')->name('images.gallery');
Route::post('/images/{parent_id}/store_image', 'Admin\ImageController@storeImage')->name('images.store_image');
Route::delete('/images/{parent_id}/destroy_image', 'Admin\ImageController@destroyImage')->name('images.destroy_image')
?>
