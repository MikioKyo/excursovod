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

Route::get('/login', function () {
    return view('login');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/test1', function () {
    return view('test1');
});

Route::get('/upload', function() {
    return view('upload');
});

Route::get('/myexcursions/add', function() {
    return view('addnew');
});

Route::get('myexcursions', 'MarkerController@excursions');

Route::get('map', 'MarkerController@index');

Route::post('map1','CreateMarkerController@store');



Route::get('/signup', function () {
    return view('signup');
});
Auth::routes();

Route::get('/home', function () {
    return view('home');
});