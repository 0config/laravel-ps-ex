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
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// below this is for user admin

Route::get('/ps_admin/users',
    ['middleware' => 'ps_admin', function () {
        $users = \App\User::orderBy('id', 'desc')->paginate(env('PAGINATION_XS'));// change your number here
        echo Request::path(); // integration pending...
        return view('ps_admin/users', compact('users'));
    }]
);

