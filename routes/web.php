<?php

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
Route::group(['middleware' => ['auth','verified'],'prefix' => 'admin', 'namespace' => 'Admin','as'=>'admin.'], function () {
    Route::get('/', 'PanelController@index')->name('panel')
    ;
});

