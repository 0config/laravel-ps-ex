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



//  ps_group route STARTS ------------------------------------
Route::get('/ps_group', function () {
    $ps_groups = App\Ps_group::orderBy('id', 'desc')->paginate(env('PAGINATION_SM'));// change your number here
    $ps_groups = $ps_groups->appends(Input::except('page'));
    return view('ps_group/ps_group_list', compact('ps_groups'));
});

// make sure this comes before detail page
Route::get('/ps_group/create', 'Ps_groupsController@autoIns');

// for detail page
Route::get('/ps_group/{id}', function ($id) {
    $ps_group = App\Ps_group::find($id);
    return view('ps_group/ps_group_detail', compact('ps_group'));
});

Route::get('/ps_group/{id}/edit', function ($id) { // for edit GET
    $ps_group = App\Ps_group::find($id);
    if (count($ps_group) < 1) { // later refine this and do the same for update..
        echo 'record not found ';
        exit;
    }
    return view('ps_group/ps_group_edit', compact('ps_group'));
});

Route::post('/ps_group/{id}/edit', 'Ps_groupsController@edit'); // for edit POST


//  ps_group route ENDS ------------------------------------

//  ps_acl route STARTS ------------------------------------


Route::get('/ps_acl', function () {
    $ps_acls = App\Ps_acl::orderBy('id', 'desc')->paginate(3);// change your number here
    $ps_acls = $ps_acls->appends(Input::except('page'));
    return view('ps_acl/ps_acl_list', compact('ps_acls'));
});

// make sure this comes before detail page
Route::get('/ps_acl/create', 'Ps_aclsController@autoIns');

// for detail page
Route::get('/ps_acl/{id}', function ($id) {
    $ps_acl = App\Ps_acl::find($id);
    return view('ps_acl/ps_acl_detail', compact('ps_acl'));
});

Route::get('/ps_acl/{id}/edit', function ($id) { // for edit GET
    $ps_acl = App\Ps_acl::find($id);
    if (count($ps_acl) < 1) { // later refine this and do the same for update..
        echo 'record not found ';
        exit;
    }
    return view('ps_acl/ps_acl_edit', compact('ps_acl'));
});

Route::post('/ps_acl/{id}/edit', 'Ps_aclsController@edit'); // for edit POST


//  ps_acl route ENDS ------------------------------------

