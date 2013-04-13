$(document).ready(function(){
	
	var validator = $("#frmPersonal").validate({
		rules: {
			fname: {
				required: true,
				minlength: 3
			},
			lname: {
				required: true,
				minlength:3
			},
			gender: {
				required: true
			},
			phno: {
				required: true,
				minlength:10,
				number: true
			},
			paddress: {
				required: true
			},
			caddress: {
				required: true
			},
			city: {
				required: true
			},
			state: {
				required: true
			},
			country: {
				required: true
			},
			pincode: {
				required: true,
				minlength:6,
				number: true
			}
		},
		messages: {
			fname: {
				required: "Please enter your name",
				minlength: jQuery.format("Your first name needs to be at least {0} characters")
			},
			lname:{
				required: "Please enter last name",
				minlength: jQuery.format("Your first name needs to be at least {0} characters")
			},
			gender: {
				required: "Please select a gender"
			},
			phno: {
				required: "Please enter phone number",
				minlength: jQuery.format("Your phone number needs to be at least {0} characters"),
				number: "numeric data only"
			},
			paddress: {
				required: "Please enter Permanent Address"
			},
			caddress: {
				required: "Please enter Current Address"
			},
			city: {
				required: "Please enter City"
			},
			state: {
				required: "Please enter State"
			},
			country: {
				required: "Please enter Country"
			},
			pincode: {
				required: "Please enter pincode",
				minlength: jQuery.format("Your pincode needs to be at least {0} characters"),
				number: "numeric data only"
			}
		},
		success: {
			
		}
	});
});
