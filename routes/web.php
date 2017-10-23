<?php

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/moduler', 'ModuleController@index')->name('moduler');

Route::get('/manage', 'ManageController@index')->name('manage.index');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::put('/users/{user}', 'UserController@update')->name('users.update');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');

Route::get('/client', 'ClientController@index')->name('clients.index');
Route::get('/client/edit', 'ClientController@edit')->name('clients.edit');
Route::post('/client', 'ClientController@update')->name('clients.update');

Route::get('/clientadress/create', 'ClientAdressController@create')->name('clientadress.create');
Route::post('/clientadress', 'ClientAdressController@store')->name('clientadress.store');
Route::get('/clientadress/{adress}', 'ClientAdressController@show')->name('clientadress.show');
Route::get('/clientadress/{adress}/edit', 'ClientAdressController@edit')->name('clientadress.edit');
Route::put('/clientadress/{adress}', 'ClientAdressController@update')->name('clientadress.update');

Route::resource('customers', 'CustomerController');

