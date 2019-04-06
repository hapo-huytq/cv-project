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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'admin',
], function (){
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
], function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('users','UserController')->except([
        'show'
    ])->names([
        'store' => 'admin.users.store',
        'create' => 'admin.users.create',
        'index' => 'admin.users.index',
        'destroy' => 'admin.users.destroy',
        'update' => 'admin.users.update',
        'edit' => 'admin.users.edit',
    ]);
});
