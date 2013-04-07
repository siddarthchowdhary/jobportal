$(document).ready(function(){
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Textual data only!");
	$.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "only letters, numbers, or dashes.");
	
	var validator = $("#frmPersonal").validate({
		rules: {
			fname: {
				lettersonly: true
			},
			mname: {
				lettersonly: true
			},
			lname: {
				lettersonly: true
			},
			dob: {
				date: true
			},
			phno: {
				minlength:10,
				number: true
			},
			paddress: {
				loginRegex: true
			},
			caddress: {
				loginRegex: true
			},
			city: {
				loginRegex: true
			},
			state: {
				loginRegex: true
			},
			country: {
				lettersonly: true
			},
			pincode: {
				minlength:6,
				number: true
			}
		},
		messages: {
			phno: {
				minlength: jQuery.format("Your phone number needs to be at least {0} characters"),
				number: "numeric data only"
			},
			pincode: {
				minlength: jQuery.format("Your pincode needs to be at least {0} characters"),
				number: "numeric data only"
			}
		},
		success: {
			
		}
	});
});
