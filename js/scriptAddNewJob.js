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
    $.validator.addMethod("daterequired", function(value, element) {
        return this.optional(element) || /^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/.test(value);
    }, "Date in yyyy-mm-dd format only");
	
	var validator = $("#frmAddJob").validate({
		rules: {
			postName: {
				lettersonly: true
			},
			experience: {
				number: true
			},
			dateOfLastApplying: {
				date: true,
				daterequired: true
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
