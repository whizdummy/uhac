(function(){
	'use strict';

	angular
		.module('app')
		.controller('billerCtrl', billerCtrl);

		$(document).ready(function(){
		   // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		   $('.modal-trigger').leanModal();
		 });

		function billerCtrl( DTOptionsBuilder, DTColumnDefBuilder, $filter, Biller){
			var vm = this;

			var update 		=	null;
			   
		   vm.dtOptions = DTOptionsBuilder.newOptions().withPaginationType('full_numbers').withDisplayLength(5);
		   vm.dtColumnDefs = [
		       DTColumnDefBuilder.newColumnDef(0),
		       DTColumnDefBuilder.newColumnDef(1)
		   ];

		   Biller.get().$promise.then(function(data){
		   		vm.billers 			=	$filter('orderBy')(data.billers, 'str_biller', false);
		   });

		   vm.saveBiller			=	function(){

		   	if (update){

		   		Biller.update({id : vm.biller.int_bill_id}, vm.biller).$promise.then(function(data){

		   			vm.billers.splice(vm.biller.index, 1);
		   			vm.billers.push(data.biller);
		   			vm.billers 			=	$filter('orderBy')(vm.billers, 'str_biller', false);
		   			$('#inputModal').closeModal();
		   			vm.biller 			=	null;
		   			Materialize.toast(data.message, 2000);
		   			update 				=	false;

		   		})
		   			.catch(function(response){
		   				Materialize.toast(response.data.message);
		   			});

		   	}else{

		   		var biller 			=	new Biller(vm.biller);
		   		biller.$save(function(data){
		   			vm.billers.push(data.biller);
		   			vm.billers 			=	$filter('orderBy')(vm.billers, 'str_biller', false);
		   			vm.biller 			=	null;
		   			$('#inputModal').closeModal();
		   			Materialize.toast(data.message, 2000);
		   		}, function(response){
		   			Materialize.toast(response.data.message, 2000);
		   		});

		   	}//end else

		   }//end function
			 
		   vm.updateBiller			=	function(biller, index){

		   	Biller.get({id : biller.int_bill_id, method : 'edit'}).$promise.then(function(data){

		   		vm.biller 			=	data.biller;
		   		vm.biller.index 	=	index;
		   		update 				=	true;
		   		$('#inputModal').openModal();

		   	});

		   }//end function

		   vm.deleteBiller 			=	function(biller, index){

		   	biller.id 				=	biller.int_bill_id;
		   	var billerToDelete 				=	new Biller(biller);
		   	billerToDelete.$delete(function(data){

		   		vm.billers.splice(index, 1);
		   		Materialize.toast(data.message, 2000);

		   	}, function(response){

		   		Materialize.toast(response.data.message, 2000);

		   	});

		   }//end function

		}//end function
})();