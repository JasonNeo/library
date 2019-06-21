/**
 * File : editBook.js 
 * 
 * This file contain the validation of edit book form
 * 
 */
$(document).ready(function(){
	
	var editBookForm = $("#editBook");
	var validator = editBookForm.validate({
		
		rules:{
			title :{ required : true },
			author :{ required : true },
			description :{ required : true },
			subject : { required : true }
		},
		messages:{
			title :{ required : "This field is required" },
			author :{ required : "This field is required" },
			description :{ required : "This field is required" },
			subject :{ required : "This field is required" }		
		}
	});

});