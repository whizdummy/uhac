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

Route::get('/category-maintenance', function () {
    return view('category');
});
Route::get('/biller-maintenance', function () {
    return view('biller');
});


Route::group(['prefix' => 'api/finapp'], function(){

	Route::group(['prefix' => 'v1'], function(){

		Route::group(['prefix' => 'accounts'], function(){

			Route::group(['prefix' => '{id}'], function(){
				Route::resource('goals', 'Api\v1\GoalController');
				Route::get('transactions', 'Api\v1\TransactionController@getAccountTransactions');

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
		Route::resource('sessions', 'Api\v1\LoginController');
	});

});
