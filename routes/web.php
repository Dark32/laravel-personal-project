<?php

use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//----User profile----
Route::get('/profile', 'UserProfileController@index')->name('users.profile')->middleware('auth');
Route::get('/profile/{user:name}', 'UserProfileController@show')->name('users.show');
//--------------------
Route::group(['middleware' => ['auth','verified', 'can:admin.panel'],'prefix' => 'admin', 'namespace' => 'Admin','as'=>'admin.'], function () {
    Route::get('/', 'PanelController@index')->name('panel');

    Route::get('/user/list','UserListController@index')->name('user.list')->middleware('can:admin.user.list');
    Route::get('/user/edit/{user}','UserListController@edit')->name('user.edit')->middleware('can:admin.user.edit');
    Route::get('/user/find', 'UserListController@find')->name('user.find')->middleware('can:admin.user.edit');
    Route::patch('/user/update/{user}','UserListController@update')->name('user.update')->middleware('can:admin.user.edit');

    Route::get('/role/list','RoleListController@index')->name('role.list')->middleware('can:admin.role.list');
    Route::get('/role/edit/{role}','RoleListController@edit')->name('role.edit')->middleware('can:admin.role.edit');
    Route::get('/role/find', 'RoleListController@find')->name('role.find')->middleware('can:admin.role.edit');
    Route::patch('/role/update/{role}','RoleListController@update')->name('role.update')->middleware('can:admin.role.edit');
    Route::get('/role/create','RoleListController@create')->name('role.create')->middleware('can:admin.role.create');
    Route::patch('/role/store/','RoleListController@store')->name('role.store')->middleware(['can:admin.role.create','can:admin.role.edit']);
    Route::get('/role/delete/{role}','RoleListController@delete')->name('role.delete')->middleware('can:admin.role.delete');

    Route::get('/permission/list','PermissionListController@index')->name('permission.list')->middleware('can:admin.permission.list');
    Route::get('/permission/edit/{permission}','PermissionListController@edit')->name('permission.edit')->middleware('can:admin.permission.edit');
    Route::get('/permission/find', 'PermissionListController@find')->name('permission.find')->middleware('can:admin.permission.edit');
    Route::patch('/permission/update/{role}','PermissionListController@update')->name('permission.update')->middleware('can:admin.permission.edit');

    Route::get('/activity/list/{column?}/{desc?}','UserIpActivityListController@index')->name('activity.list')->middleware('can:admin.activity.list');
    Route::get('/activity/list-vue','UserIpActivityListController@vue')->name('activity.list.vue')->middleware('can:admin.activity.list');
});


