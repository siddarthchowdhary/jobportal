$(document).ready(function(){
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Textual data only!");
	// validate signup form on keyup and submit    
	var validator = $("#frmRegisterEmployer").validate({
		rules: {
			firstName: {
				required: true,
				lettersonly: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true
			},
			lastName: {
				required: true,
				lettersonly: true,
				minlength: 3
			},
			passwordEmployer: {
				required: true,
                minlength: 6
			},
            confirmPasswordEmployer: {
				required: true,
                equalTo: "#passwordEmployer"
			},
			companyName: {
				required: true,
				lettersonly: true,
				minlength: 3
			},
			contactNumber: {
				required: true,
				number: true
			},
			captcha: {
				required: true
			}
			
		},
		messages: {
			firstName: {
				required: "Please enter your first name",
				minlength: jQuery.format("Your first name needs to be at least {0} characters")
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address"
			},
			lastName: {
				required: "Please enter your last name",
				minlength: jQuery.format("Your last name needs to be at least {0} characters")
			},
			passwordEmployer: {
				required: "You need to enter a password!",
				minlength: jQuery.format("Enter at least {0} characters")
			},
            confirmPasswordEmployer: {
				required: "enter password once again!"
			},
			companyName: {
				required: "Please enter your name",
				minlength: jQuery.format("Your first name needs to be at least {0} characters")
			},
			captcha: {
				required: "Please Enter captcha to continue"
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			label.addClass("checked");
		}
	});
});
