<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ContactsController@getIndex');

Route::post('add', 'ContactsController@postAddNewContact');
Route::post('delete', 'ContactsController@postDeleteContact');
Route::post('edit', 'ContactsController@postEditContact');

