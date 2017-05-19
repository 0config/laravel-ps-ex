<?php
use Illuminate\Support\Facades\Input;


// below this is for user admin
Route::get('/ps_admin/',
    ['middleware' => 'ps_admin', function () {


        ($routeCollection = Route::getRoutes());
//        dd($routeCollection);
//        dd($routeCollection->GET);
//        exit;

    $string = "Hello {world} .. can you {hear}";
       echo  $string = preg_replace('#\{.*?\}#s', '/', $string);

        echo '<h1>list of all routes</h1>';
        foreach ($routeCollection as $value) {
//            echo $value->getPath();
            echo ($value->uri);
            echo '<BR>';
        }
        exit;
        return view('PS_admin/index');
    }]
);

Route::get('/ps_admin/users',
    ['middleware' => 'ps_admin', function () {
        $users = \App\User::orderBy('id', 'desc')->paginate(env('PAGINATION_XS'));// change your number here
        echo Request::path(); // integration pending...
        return view('PS_admin/users', compact('users'));
    }]
);

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

Route::get('/ps_group', 'Ps_groupsController@master_list')->name('ps_group.master_list');
// make sure this comes before detail page
Route::get('/ps_group/create', 'Ps_groupsController@autoIns')->name('ps_group.create');

Route::get('/ps_group/detail/{id}', 'Ps_groupsController@detail')->name('ps_group.detail');
Route::get('/ps_group/edit/{id}', 'Ps_groupsController@edit')->name('ps_group.edit');
Route::post('/ps_group/edit/{id}', 'Ps_groupsController@edit_post')->name('ps_group.edit_post'); // for edit POST

//  ps_group route ENDS ------------------------------------



