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
//  ps_acl route STARTS ------------------------------------

Route::get('/ps_acl', 'Ps_aclsController@master_list')->name('ps_acl.master_list');
// make sure this comes before detail page
Route::get('/ps_acl/create', 'Ps_aclsController@autoIns')->name('ps_acl.create');

Route::get('/ps_acl/detail/{id}', 'Ps_aclsController@detail')->name('ps_acl.detail');
Route::get('/ps_acl/edit/{id}', 'Ps_aclsController@edit')->name('ps_acl.edit');
Route::post('/ps_acl/edit/{id}', 'Ps_aclsController@edit_post')->name('ps_acl.edit_post'); // for edit POST


//  ps_acl route ENDS ------------------------------------

//  ps_group route STARTS ------------------------------------
Route::get('/ps_group', function () {
    $ps_groups = App\Ps_group::orderBy('id', 'desc')->paginate(env('PAGINATION_SM'));// change your number here
    $ps_groups = $ps_groups->appends(Input::except('page'));
    return view('ps_group/ps_group_list', compact('ps_groups'));
})->name('ps_group.list');

// make sure this comes before detail page
Route::get('/ps_group/create', 'Ps_groupsController@autoIns')->name('ps_group.create');

// for detail page
Route::get('/ps_group/detail/{id}', function ($id) {
    $ps_group = App\Ps_group::find($id);
    return view('ps_group/ps_group_detail', compact('ps_group'));
})->name('ps_group.detail');

Route::get('/ps_group/edit/{id}', function ($id) { // for edit GET
    $ps_group = App\Ps_group::find($id);
    if (count($ps_group) < 1) { // later refine this and do the same for update..
        echo 'record not found ';
        exit;
    }
    return view('ps_group/ps_group_edit', compact('ps_group'));
})->name('ps_group.edit');

Route::post('/ps_group/edit/{id}/', 'Ps_groupsController@edit')->name('ps_group.edit_post'); // for edit POST


//  ps_group route ENDS ------------------------------------



