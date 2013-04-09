$(document).ready(function(){
$.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "only letters, numbers, or dashes.");	
	
	var validator = $("#frmUpdateEducational").validate({
		
		rules: {
			pg: {
				loginRegex: true
			},
			phd: {
				loginRegex: true
			},
			otherQual: {
				loginRegex: true
			}
		}
	});
});
