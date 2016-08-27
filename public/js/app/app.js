(function(){
	'use strict';

	var apiUrl			=	'http://localhost:8000/api/finapp/';

	angular
		.module('app', ['datatables', 'ngResource'])
		.factory('Biller', function($resource){
			return $resource(apiUrl+'v1/billers/:id/:method', {
				id 			: 	'@id'
			},{
				update 		: 	{
					method 	: 	'PUT',
					isArray	: 	false
				}
			});
		})
		.factory('Category', function($resource){
			return $resource(apiUrl+'v1/categories/:id/:method', {
				id 			: 	'@id',
				method 		: 	'@method'
			},{
				update 		: 	{
					method 	: 	'PUT',
					isArray	: 	false
				}
			});
		});
		
})();