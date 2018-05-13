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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('students', 'StudentController');
    Route::resource('services', 'ServiceController');
    Route::get('subservices/{currentServiceId}/create', 'SubServiceController@create'); 
    Route::post('subservices', 'SubServiceController@store'); 
    Route::delete('subservices/{id}', 'SubServiceController@destroy'); 
    Route::get('subservices/{id}/edit', 'SubServiceController@edit'); 
    Route::put('subservices/{id}', 'SubServiceController@update');
    Route::get('subservices/{id}', 'SubServiceController@show');
    Route::get('subservices/', 'SubServiceController@index');  
    // Route::resource('subservices', 'SubserviceController');
});