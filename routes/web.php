<?php


//Route::get('/', function()
//{
//    return 'Hello';
//});
Route::get('/picture_form','ImageController@loadImage');

Route::post('/images_load','ImageController@croppedImage');

Route::get('/images_show/{pictId}', 'ImageController@show')->name('show','pictId');

Route::get('/image_slice/{img_id?}/{slice_id?}','ImageController@imageSlice')->name('imgslice');



