$(document).ready(function(){
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-zA-Z ]*$/.test(value);           
	}, "Alphabetic characters only!");
	var validator = $("#frmRegisterCompany").validate({
		rules: {
			companyName: {
				required: true,
				lettersonly: true
			},
			website: {
				required: true,
				url: true
			},
			keyFunctionalArea: {
				required: true,
				lettersonly: true
			},
			city: {
				required: true,
				lettersonly: true
			},
			country: {
				required: true,
				lettersonly: true
			}
		},
		messages: {
			companyName: {
				required: "Company Name is reqired"
			},
			website: {
				required: "Website is reqired",
				url: "enter a full and valid url like http://www.example.com"
			},
			keyFunctionalArea: {
				required: "Key Functional Area is reqired"
			},
			city: {
				required: "City is reqired"
			},
			country: {
				required: "Country is reqired"
			}
		}
	});
});
