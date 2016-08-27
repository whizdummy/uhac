<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/finapp'], function(){

	Route::group(['prefix' => 'v1'], function(){

		Route::group(['prefix' => 'accounts'], function(){

			Route::group(['prefix' => '{id}'], function(){

				Route::group(['prefix' => 'bank-accounts'], function() {
					Route::resource('/', 'Api\v1\BankAccountController');
					Route::resource('{bankAccountId}/transactions', 'Api\v1\TransactionController');
				});

			});

		});
		Route::resource('accounts', 'Api\v1\AccountController');
		Route::resource('billers', 'Api\v1\BillerController');
		Route::resource('business-dependencies', 'Api\v1\BusinessDependencyController');
		Route::resource('categories', 'Api\v1\CategoryController');

	});

});
