$(document).ready(function(){
	// validate signup form on keyup and submit
	var validator = $("#frmJobSearch").validate({
		rules: {
			experience: {
				number: true
			}
		},
		messages: {
			experience: {
				number: "exp in no of years only"
			}
		},
	});
});
