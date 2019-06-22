/**
 * File : addBook.js
 * 
 * This file contain the validation of add book form
 * 
 * Using validation plugin : jquery.validate.js
 */

$(document).ready(function(){
	
	var addBookForm = $("#addBook");
	var validator = addBookForm.validate({
		
		rules:{
			title :{ required : true },
			author :{ required : true },
			description :{ required : true },
			subject :{ required : true },
		},
		messages:{
			title :{ required : "This field is required" },		
			author :{ required : "This field is required" },		
			description :{ required : "This field is required" },		
			subject :{ required : "This field is required" },		
		}
	});
});
