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

Route::get('/', 'FrontController@getHome')->name('home');
Route::post('/api/getTourInfo', 'FrontController@getTourInfo')->name('getTourInfo');
Route::get('/api/getAvailableDates', 'FrontController@getAvailableDates')->name('getAvailableDates');
Route::get('/api/getAvailableLocationFrom', 'FrontController@getAvailableLocationFrom')->name('getAvailableLocationFrom');
Route::post('/api/searchTourAdvance', 'FrontController@searchTourAdvance')->name('searchTourAdvance');

Route::get('/tour-du-lich', 'FrontController@getAllTours')->name('tours');
Route::get('/chi-tiet-tour/{tour}', 'FrontController@tourDetails')->name('tourDetails');
Route::post('/chi-tiet-tour/{tour}', 'FrontController@createRegistration')->name('createRegistration');
Route::get('/dang-ky-tour/{tour}', 'FrontController@tourRegistration')->name('tourRegistration');
Route::post('/dang-ky-tour/{tour}', 'FrontController@tourDetailsUpdate')->name('tourDetailsUpdate');
Route::get('/dang-ky-tour/{tour}/payment', 'FrontController@tourPaymentUpdateForm')->name('tourPaymentUpdateForm');
Route::post('/dang-ky-tour/{tour}/payment', 'FrontController@tourCreateRegistration')->name('tourCreateRegistration');
Route::get('/dang-ky-hoan-tat/{registration}', 'FrontController@thankYouPage')->name('thankYouPage');

Route::get('{slug}/{param?}', '\Remipou\NovaPageManager\PageController@page')
    ->where('slug', '^((?!'.trim(config('nova.path'), '/').'|nova-).)*$');
