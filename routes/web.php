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
use \RealRashid\SweetAlert\Facades\Alert;


Route::get('/', function () {
    return view('welcome');
});

Route::POST('editPost','ContactInfoController@update')->name('editPost');
Route::resource('contactinfo','ContactInfoController');
Route::resource('contactList','ContactDataController');
Route::get('AllContact','ContactDataController@getAllContact')->name('AllContact');
Route::get('all/contact','ContactInfoController@ALLContact')->name('all.contact');