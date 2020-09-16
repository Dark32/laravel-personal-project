<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PermissionListController;
use App\Http\Controllers\Admin\RoleListController;
use App\Http\Controllers\Admin\UserIpActivityListController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialNetworkBadgeController;
use App\Http\Controllers\Admin\SocialNetworkBadgeController as AdminSocialNetworkBadgeController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

//----User profile----
Route::get('/profile', [UserProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::get('/user/{user:name}', [UserProfileController::class, 'show'])->name('users.show');
Route::get('/users', [UserProfileController::class, 'list'])->name('users.list');
Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('users.profile.edit')->middleware('auth');
Route::get('/profile/vue', [UserProfileController::class, 'vueEdit'])->name('users.profile.vue')->middleware('auth');
Route::post('/profile/update/name-and-pass', [UserProfileController::class, 'updateNameAndPass'])
    ->name('users.profile.updateNameAndPass')
    ->middleware('auth')
;

//--------------------
Route::group([
    'middleware' => ['auth', 'verified', 'can:admin.panel'],
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('/', [PanelController::class, 'index'])->name('panel');

    Route::get('/user/list', [UserListController::class, 'index'])
        ->name('user.list')
        ->middleware('can:admin.user.list')
    ;
    Route::get('/user/edit/{user}', [UserListController::class, 'edit'])
        ->name('user.edit')
        ->middleware('can:admin.user.edit')
    ;
    Route::get('/user/find', [UserListController::class, 'find'])->name('user.find')->middleware('can:admin.user.edit');
    Route::patch('/user/update/{user}', [UserListController::class, 'update'])
        ->name('user.update')
        ->middleware('can:admin.user.edit')
    ;

    Route::get('/role/list', [RoleListController::class, 'index'])
        ->name('role.list')
        ->middleware('can:admin.role.list')
    ;
    Route::get('/role/edit/{role}', [RoleListController::class, 'edit'])
        ->name('role.edit')
        ->middleware('can:admin.role.edit')
    ;
    Route::get('/role/find', [RoleListController::class, 'find'])->name('role.find')->middleware('can:admin.role.edit');
    Route::patch('/role/update/{role}', [RoleListController::class, 'update'])
        ->name('role.update')
        ->middleware('can:admin.role.edit')
    ;
    Route::get('/role/create', [RoleListController::class, 'create'])
        ->name('role.create')
        ->middleware('can:admin.role.create')
    ;
    Route::patch('/role/store/', [RoleListController::class, 'store'])
        ->name('role.store')
        ->middleware(['can:admin.role.create', 'can:admin.role.edit'])
    ;
    Route::get('/role/delete/{role}', [RoleListController::class, 'delete'])
        ->name('role.delete')
        ->middleware('can:admin.role.delete')
    ;

    Route::get('/permission/list', [PermissionListController::class, 'index'])
        ->name('permission.list')
        ->middleware('can:admin.permission.list')
    ;
    Route::get('/permission/edit/{permission}', [PermissionListController::class, 'edit'])
        ->name('permission.edit')
        ->middleware('can:admin.permission.edit')
    ;
    Route::get('/permission/find', [PermissionListController::class, 'find'])
        ->name('permission.find')
        ->middleware('can:admin.permission.edit')
    ;
    Route::patch('/permission/update/{role}', [PermissionListController::class, 'update'])
        ->name('permission.update')
        ->middleware('can:admin.permission.edit')
    ;

    Route::get('/activity/list/{column?}/{desc?}', [UserIpActivityListController::class, 'index'])
        ->name('activity.list')
        ->middleware('can:admin.activity.list')
    ;
    Route::get('/activity/list-vue', [UserIpActivityListController::class, 'vue'])
        ->name('activity.list.vue')
        ->middleware('can:admin.activity.list')
    ;

    Route::resource('/social-network-badge', AdminSocialNetworkBadgeController::class)->except('show');
    Route::resource('/user-social-network-badge', AdminSocialNetworkBadgeController::class)->except('show');
});

Route::get('/social-network-badge/find', [SocialNetworkBadgeController::class, 'find'])->name('snb.find');

