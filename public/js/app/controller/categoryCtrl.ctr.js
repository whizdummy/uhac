(function(){
	'use strict';

	angular
		.module('app')
		.controller('categoryCtrl', categoryCtrl);

		$(document).ready(function(){
		   // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		   $('.modal-trigger').leanModal();
		 });

		function categoryCtrl( DTOptionsBuilder, DTColumnDefBuilder, Category, $filter){
			var vm = this;
			var update			=	null;
			
			   vm.dtOptions = DTOptionsBuilder.newOptions().withPaginationType('full_numbers').withDisplayLength(5);
			   vm.dtColumnDefs = [
			       DTColumnDefBuilder.newColumnDef(0),
			       DTColumnDefBuilder.newColumnDef(1)
			   ];
			 
			Category.get().$promise.then(function(data){

				vm.categories 			=	$filter('orderBy')(data.categories, 'str_category', false);

			});

			vm.saveCategory 			=	function(){

				if (update){

					Category.update({id : vm.category.int_category_id}, vm.category).$promise.then(function(data){

						vm.categories.splice(vm.category.index, 1);
						vm.categories.push(data.category);
						vm.categories 		=	$filter('orderBy')(vm.categories, 'str_category', false);
						Materialize.toast(data.message, 2000);
						$('#inputModal').closeModal();
						update 				=	false;
						vm.category 		=	null;

					}, function(response){
						Materialize.toast(response.data.message, 2000);
					});

				}else{

					var category 			=	new Category(vm.category);
					category.$save(function(data){

						vm.categories.push(data.category);
						vm.categories			=	$filter('orderBy')(vm.categories, 'str_category', false);
						vm.category 			=	null;
						$('#inputModal').closeModal();
						Materialize.toast(data.message, 2000);

					}, function(response){
						Materialize.toast(response.data.message, 2000);
					});

				}//end if else

			}//end function

			vm.updateCategory 			=	function(category, index){

				Category.get({id : category.int_category_id, method : 'edit'}).$promise.then(function(data){

					category.index 			=	index;
					vm.category 			=	data.category;
					$('#inputModal').openModal();
					update 					=	true;

				});

			}//end function

			vm.deleteCategory 			=	function(category, index){

				category.id 			=	category.int_category_id;
				var categoryToDelete 		=	new Category(category);
				categoryToDelete.$delete(function(data){

					Materialize.toast(data.message, 2000);
					vm.categories.splice(index, 1);

				},function(response){
					Materialize.toast(response.data.message, 2000);
				});

			}//end function

		}//end function
})();