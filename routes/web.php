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
| ps_com : additional route is defined in PS_route.php file via App\Providers\RouteServiceProvider.php
*/
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


