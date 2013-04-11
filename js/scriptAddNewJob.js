$(document).ready(function(){
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Textual data only!");
	$.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-z0-9]+$/i.test(value);
    }, "only letters and numbers allowed.");
    $.validator.addMethod("alphacomma", function(value, element) {
        return this.optional(element) || /^[a-z\,\s]+$/i.test(value);
    }, "only letters seperated with commas allowed.");
    $.validator.addMethod("specialalpha", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-,:\s]+$/i.test(value);
    }, "only letters with dashes(-) and colon(:) allowed.");
    
	
	var validator = $("#frmAddJob").validate({
		rules: {
			postName: {
				lettersonly: true
			},
			experience: {
				number: true
			},
			date: {
				date: true
			},
			expectedSalary: {
				number: true
			},
			jobDescription: {
				specialalpha: true
			},
			jobLocation: {
				lettersonly: true
			},
			keywords: {
				alphacomma: true
			}
		},
		/*messages: {
			
		},
		success: {
			
		}*/
	});
});
