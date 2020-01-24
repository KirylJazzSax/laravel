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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/records', 'RecordsController@index')->name('records');
Route::post('/record/create', 'RecordsController@store');
Route::get('/record/create', 'RecordsController@create');
Route::delete('/record/{record}/delete', 'RecordsController@destroy')->middleware('can:delete,record');
Route::get('/record/{record}/edit', 'RecordsController@edit')->middleware('can:update,record');
Route::put('/record/{record}', 'RecordsController@update')->middleware('can:update,record');

Route::get('/admin/users', 'AdminController@index')->middleware('admin');
Route::get('/admin/users/{user}/records', 'AdminController@userRecords')->middleware('admin');
Route::post('/admin/users/{user}/records/create', 'AdminController@store')->middleware('admin');
Route::get('/admin/users/{user}/records/create', 'AdminController@create')->middleware('admin');


