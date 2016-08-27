(function(){
	'use strict';

	angular
		.module('app')
		.controller('businessDepCtrl', businessDepCtrl);

		$(document).ready(function(){
		   // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		   $('.modal-trigger').leanModal();
		 });

		function businessDepCtrl( DTOptionsBuilder, DTColumnDefBuilder){
			var vm = this;
			   vm.persons = [
			   		{
			   		   
			   		    "firstName": "Superman",
			   		   
			   		}, {
			   		  
			   		    "firstName": "Foo",
			   		
			   		}, {
			   		    
			   		    "firstName": "Toto",
			   		    
			   		}, {
			   		   
			   		    "firstName": "Luke",
			   		    
			   		}
			   ];
			   vm.dtOptions = DTOptionsBuilder.newOptions().withPaginationType('full_numbers').withDisplayLength(10);
			   vm.dtColumnDefs = [
			       DTColumnDefBuilder.newColumnDef(0),
			       DTColumnDefBuilder.newColumnDef(1)
			   ];
			 
		}
})();