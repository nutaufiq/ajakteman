<?php
use Illuminate\Http\Request;
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

/*Landing*/

//login
Route::get('/', 'AuthController@login_perujuk');
Route::get('login', 'AuthController@login_terujuk');

Route::post('login', 'AuthController@do_login');

//register
Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@do_register');
/*-------*/


/*Dashboard*/

//dashboard perujuk
Route::get('dashboard', 'DashboardController@index');

//dashboard terujuk
Route::get('dashboard/pasang-iklan', 'DashboardController@ads');

//action perujuk
Route::post('dashboard/invite', 'DashboardController@invite');
Route::post('dashboard/redeem', 'DashboardController@redeem');
Route::post('dashboard/reminder', 'DashboardController@reminder');

//logout
Route::get('dashboard/logout', function(Request $request)
{
	$request->session()->forget('access_token');
	
	Auth::logout();

	return redirect('/');
});
/*---------*/


/*Pasang Iklan*/

Route::get('dashboard/pasang-iklan/form', 'AdsController@index');
Route::post('dashboard/pasang-iklan/form', 'AdsController@store');

Route::post('dashboard/pasang-iklan/upload', 'AdsController@upload');
Route::post('dashboard/pasang-iklan/delete', 'AdsController@delete');

Route::get('dashboard/pasang-iklan/category/{id}', 'AdsController@category');
/*------------*/


/*Webcontrol*/

Route::get('webcontrol', 'UserController@login');
Route::post('webcontrol', 'UserController@do_login');
Route::get('webcontrol/logout', 'UserController@logout');

Route::group(['middleware' => ['admin'], 'prefix' => 'webcontrol'], function () 
{
	Route::get('admin', 'AdminController@index');
	Route::get('admin/add', 'AdminController@create');
	Route::post('admin/add', 'AdminController@store');
	Route::get('admin/{id}/edit', 'AdminController@edit');
	Route::post('admin/{id}/edit', 'AdminController@update');
	Route::get('admin/{id}/delete', 'AdminController@destroy');

	Route::get('user', 'UserController@index');
	Route::get('user/add', 'UserController@create');
	Route::post('user/add', 'UserController@store');
	Route::get('user/{id}/edit', 'UserController@edit');
	Route::post('user/{id}/edit', 'UserController@update');
	Route::get('user/{id}/delete', 'UserController@destroy');

	Route::get('invitation', 'InvitationController@index');

	Route::get('ads', 'AdsController@lists');
	Route::get('ads/download', 'AdsController@download');
	Route::get('ads/{id}/edit', 'AdsController@edit');
	Route::post('ads/{id}/edit', 'AdsController@update');

	Route::get('redeem', 'RedeemController@index');
	Route::get('redeem/download', 'RedeemController@download');
	Route::get('redeem/{id}/edit', 'RedeemController@edit');
	Route::post('redeem/{id}/edit', 'RedeemController@update');
});
/*----------*/