<?php
/* @author 		: Ashwani Singh
 * @date   		: 05-04-2013
 * @description : Employer Activate view
 * @module 		: Admin
 * @modified on : 
 * @todo		: client email validation
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
include_once 'header.php';
?>
<script type="text/javascript">
/*
 * 
 $(document).ready(function() {       
    // validate form on keyup and submit
    $("#frmEmpSearch").validate({
        rules: {
            // note: these pull from the "name" attrib.
            // if needed: 'user[first_name]': { required: true }
            email: { required: true, email: true },
          
        },
        messages: {            
            email: "Please enter a valid email address",
        },
        submitHandler: function(form) {
            // if you use blockui
            $.blockUI({ message: '<h1><img src="/images/admin_images/busy.gif" /> Processing...</h1>' });
            form.submit();
        }
    });
});
# function to search employer */
function searchEmployer()
{ 
	var email = $("#email").val();
	$.ajax({
			type 	: "POST",
			url 	: 'indexMain.php?controller=EmployerManagement&function=employerSearch',
			data 	: "email="+email,
			success : function(response)
			{
				$('#data').html(response);
				$("#result").show();
			}
	});
}
/* function to activate employer */
function activateEmployer(email)
{ 
	$.ajax({
			type 	: "POST",
			url 	: 'indexMain.php?controller=EmployerManagement&function=employerActivate',
			data 	: "email="+email,
			success : function(response1)
			{
				alert(response1);
				location.reload();
			}
	});
}

/* function to deactivate employer */
function deactivateEmployer(email)
{ 
	$.ajax({ 
			type 	: "POST",
			url 	: 'indexMain.php?controller=EmployerManagement&function=employerDeactivate',
			data 	: "email="+email,
			success : function(response2)
			{
				alert(response2);
				location.reload();
			}
	});
}
$(document).ready(function(){
    $("#result").hide();
})


</script>

<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2><span><?php echo EMPLOYER_MANAGE;?></span></h2>
								</div>              
								<form class="search-form" id="frmEmpSearch" method="post" action="JavaScript:void(0)">
									<fieldset>
										<div class="columns-holder">
											<div class="column">
												<div class="row">
													<label for="email"><?php echo ENTER_EMAIL; ?></label>
													<span class="text">
														<input type="email" class="text" id="email" name="email"/>
													</span>
												</div>																					
											</div>		
										
											<div class="column">												
												<div class="row">
													<label><?php echo PERFORM_SEARCH; ?></label>
													<input type="button" value="Click here" onclick= "searchEmployer()" class="btn"/>
												</div>											
											</div>		
										</div>
									</fieldset>
								</form>
								<div id="result">		<!-- displays result from searchEmployer() by jquery-->
									<div id="data">
									</div>
								</div>
			
							</div>
						</div>
					</div>
				</div>
		</div>	<!--  div class wrapper ends here -->
		<div id="sidebar">
			<div class="block">   <!--write one block div for one box sidebar-->
				<div class="holder">
					<div class="frame">
						<div class="title">
							<h3><span><?php echo MAIN_MENU; ?></span></h3>
						</div>
							<!--code here-->
						<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=employerStatistics';?>"><?php echo EMPLOYER_STATISTICS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=employerMain';?>"><?php echo EMPLOYER_MANAGE; ?></a>
						</div>						
					</div>
				</div>
			</div>
		</div> <!--  side bar ends here -->
</div>	
	
</div>	
 <!--  main div ends here -->
<?php include_once 'footer.php';?>

</body>
</html>
