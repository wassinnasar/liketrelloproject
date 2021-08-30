<?php


//Route::get('/', function()
//{
//    return 'Hello';
//});
Route::get('/picture_form','ImageController@loadImage');

Route::post('/images_load','ImageController@croppedImage');

Route::get('/images_show/{pictId}', 'ImageController@show')->name('show','pictId');

Route::get('/image_slice/{img_id?}/{slice_id?}','ImageController@imageSlice')->name('imgslice');

Route::get('/','UserController@toRegist');

Route::post('/registration','PersonController@registInfo');

Route::get('/login_form','UserController@toLogin')->name('login');

Route::post('/login_check','UserController@loginInfo');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');
//POST запрос на выход из системы (логаут)
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Маршруты регистрации...
 */

//страница с формой Laravel регистрации пользователей
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');

/**
 * URL для сброса пароля...
 */

//POST запрос для отправки email письма пользователю для сброса пароля
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('passworddocker.email');
//ссылка для сброса пароля (можно размещать в письме)
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//страница с формой для сброса пароля
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//POST запрос для сброса старого и установки нового пароля
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/item_form', 'ItemController@itemForm')->name('itemForm');

Route::post('/add_item', 'ItemController@addItem')->name('item.add');

Route::get('/show_items', 'ItemController@showItems')->middleware(['auth'])->name('showItems');

Route::get('/show_my_items', 'ItemController@showMyItems')->middleware(['auth'])->name('showMyItems');

Route::get('/delete_item/{item_id?}', 'ItemController@deleteItem')->name('deleteItem','item_id');

Route::get('/trello/{any}','SpaController@index')->where('any','.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
