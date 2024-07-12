<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\GuestBypassProtectedRoute;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['cors', 'json.response']], function () {
	Route::group(
		['prefix' => '/user', 'as' => 'api.'],
		function () {
			Route::resource('users', 'UsersController', [
				'only' => ['index', 'show', 'update', 'destroy', 'store']
			]);
			Route::post('login', 'UsersController@login');
			Route::post('otp', 'UsersController@otp');
			Route::post('register','UsersController@register');
			Route::post('getData','UsersController@ShowUser');
			Route::put('/update/{id}','UsersController@update');
			Route::delete('/delete/{id}','UsersController@delete');
			Route::get('logout','UsersController@logout')->middleware('auth:api');
		}
	);

	Route::group(['prefix' => '/category', 'as' => 'api'],function(){
		Route::post('/create', 'CategorysController@create');
		Route::get('/show', 'CategorysController@show');
		Route::delete('/del/{id}', 'CategorysController@delete');
		Route::put('/upd/{id}', 'CategorysController@update');
	});


	Route::group(['prefix' => 'Subcategory' , 'as' => 'api'],function(){
		Route::post('/create', 'SubcategoryController@create');
		Route::get('/show', 'SubcategoryController@show');
		Route::delete('/del/{id}', 'SubcategoryController@delete');
		Route::put('/upd/{id}', 'SubcategoryController@update');
	});

	Route::group(['prefix' => '/Product', 'as' => 'api.'],function(){
		Route::post('/create', 'ProductsController@create');
		Route::get('/show', 'ProductsController@show');
		Route::put('/upd/{id}', 'ProductsController@update');
		Route::delete('/del/{id}', 'ProductsController@delete');
	});

	
	Route::group(['prefix' => '/Usergroup', 'as' => 'api.'],function(){
		Route::post('/create', 'UserGroupController@create');
		Route::get('/show', 'UserGroupController@show');
		Route::put('/upd/{id}', 'UserGroupController@update');
		Route::delete('/del/{id}', 'UserGroupController@delete');
		Route::post('groupPermission','UserGroupController@GroupPermission');

	});

	Route::group(['prefix' => '/permission', 'as' => 'api.'],function(){
		Route::post('/create', 'UserGroupPermissionController@create');
		Route::get('/show', 'UserGroupPermissionController@show');
		Route::put('/upd/{id}', 'UserGroupPermissionController@update');
		Route::delete('/del/{id}', 'UserGroupPermissionController@delete');
	});


	Route::group(
		['prefix' => '/order', 'as' => 'api.'],
		function () {
			Route::post('createOrder','OrdersController@createOrders');
			Route::post('showOrder', 'OrdersController@showOrders');
		}
	);


	Route::group(['prefix' => 'orderDetail' , 'as' => 'api'],function(){
		Route::post('create', 'OrderDetailController@CreateOrdersDetails');
		Route::post('show', 'OrderDetailController@showOrdersDetails');
	});


	Route::group(['prefix' => '/Offer', 'as' => 'api'],function(){
		Route::get('/show', 'OffersController@show');
		Route::post('/create', 'OffersController@create');
		Route::put('/upd/{id}', 'OffersController@update');
		Route::delete('/del/{id}', 'OffersController@delete');
	});
	

	
});