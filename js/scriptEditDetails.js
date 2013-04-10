$(document).ready(function(){
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Textual data only!");
	var validator = $("#frmupdateEmployerDetails").validate({
		rules: {
			displayName: {
				lettersonly: true
			},
			email: {
				email: true
			},
			companyName: {
				lettersonly: true
			},
			contactNumber: {
				number: true
			}
		}
		/*messages: {
			
		},
		success: {
			
		}*/
	});
});
