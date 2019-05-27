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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('auth.login');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout')->name('user.logout');

//get admin routes
Route::group([
	'prefix' => 'admin',
], function () {
	// Admin auth routes
	Route::group([
		'namespace' => 'Auth',
	], function () {
		// Show the login page
		Route::get('/', 'LoginController@getAdminLoginPage');

		// Process the admin login request
		Route::post('/', [
			'uses' => 'LoginController@authenticateAdmin',
			'as' => 'admin.login',
		]);
	});

	/**
	 * admin functions
	 */
	Route::get('home', [
		'uses' => 'AdminController@adminDashBoard',
		'as' => 'admin.home',
	]);

	//new system user
	Route::get('sys/user', [
		'uses' => 'AdminController@addSystemUserPage',
		'as' => 'admin.add.sys.user',
	]);
	Route::post('sys/user', [
		'uses' => 'AdminController@addSystemUser',
		'as' => 'admin.add.sys.user',
	]);
	Route::get('view/sys/user', [
		'uses' => 'AdminController@viewSystemUser',
		'as' => 'admin.view.sys.user',
	]);

	//add student
	Route::get('student', [
		'uses' => 'AdminController@addStudentPage',
		'as' => 'admin.add.student',
	]);
	Route::post('student', [
		'uses' => 'AdminController@addStudent',
		'as' => 'admin.add.student',
	]);
	Route::get('view/student', [
		'uses' => 'AdminController@viewStudent',
		'as' => 'admin.view.student',
	]);

	//logout admin
	Route::get('logout', [
		'uses' => 'AdminController@logout',
		'as' => 'admin.logout',
	]);
});