$(document).ready(function(){

	$.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z\,\s]+$/i.test(value);
    }, "only letters.");	
	var validator = $("#frmUpdateProfessional").validate({
		
		rules: {
			exp: {
				number: true
			},
			keySkills: {
				loginRegex: true
			},
			functionalArea: {
				loginRegex: true
			}
		}
	});
});
