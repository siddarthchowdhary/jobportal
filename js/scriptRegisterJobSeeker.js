$(document).ready(function(){
	// validate signup form on keyup and submit
	var validator = $("#frmRegisterJobSeeker").validate({
		rules: {
			firstname: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true
			},
			lastname: {
				required: true,
				minlength: 3
			},
			password: {
				required: true,
                minlength: 8
			},
            confirmPassword: {
				required: true,
                equalTo: "#password",
				minlength: 8
			},
			captcha: {
				required: true
			}
			
		},
		messages: {
			firstname: {
				required: "Please enter your name",
				minlength: jQuery.format("Your first name needs to be at least {0} characters")
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address"
			},
			lastname: {
				required: "Please enter your name",
				minlength: jQuery.format("Your last name needs to be at least {0} characters")
			},
			password: {
				required: "You need to enter a password!",
				minlength: jQuery.format("Enter at least {0} characters")
			},
            confirmPassword: {
				required: "enter password once again!",
				minlength: jQuery.format("Enter same password")
			},
			captcha: {
				required: "enter captch from box"
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			label.addClass("checked");
		}
	});
});
