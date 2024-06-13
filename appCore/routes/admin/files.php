<?php

Route::get('/files/{parent_id}/{fileable_type}/main', 'Admin\FileController@files')->name('files.main');
Route::post('/files/{parent_id}/store_file', 'Admin\FileController@storeFile')->name('files.store_file');
Route::delete('/files/{parent_id}/destroy_file', 'Admin\FileController@destroyFile')->name('files.destroy_file')

?>
