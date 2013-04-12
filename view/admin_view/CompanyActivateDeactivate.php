<?php
/* @author 		: Ashwani Singh
 * @date   		: 12-04-2013
 * @description : Company Activate/Deactivate view
 * @module 		: Admin
 * @modified on : 
 * @todo		: client email validation
*/

include_once 'header.php';
?>
<script type="text/javascript">
/* function to search employer */
function searchCompany()
{ 
	var companyName = $("#companyName").val();
	$.ajax({
			type 	: "POST",
			url 	: 'indexMain.php?controller=EmployerManagement&function=companySearch',
			data 	: "companyName="+companyName,
			success : function(response)
			{
				$('#data').html(response);
				$("#result").show();
			}
	});
}
/* function to activate employer */
function activateCompany(companyName)
{ 
	$.ajax({
			type 	: "POST",
			url 	: 'indexMain.php?controller=EmployerManagement&function=companyActivate',
			data 	: "companyName="+companyName,
			success : function(response1)
			{
				alert(response1);
				location.reload();
			}
	});
}

/* function to deactivate employer */
function deactivateCompany(companyName)
{ 
	$.ajax({ 
			type 	: "POST",
			url 	: 'indexMain.php?controller=EmployerManagement&function=companyDeactivate',
			data 	: "companyName="+companyName,
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
									<h2><span><?php echo COMPANY_MANAGE; ?> </span></h2>
								</div>              
								<form class="search-form" id="frmEmpSearch" method="post" action="JavaScript:void(0)">
									<fieldset>
										<div class="columns-holder">
											<div class="column">
												<div class="row">
													<label for="email"><?php echo ENTER_COMPANY_NAME; ?></label>
													<span class="text">
														<input type="text" class="text" id="companyName" name="companyName"/>
													</span>
												</div>																					
											</div>		
										
											<div class="column">												
												<div class="row">
													<label><?php echo PERFORM_SEARCH; ?></label>
													<input type="button" value="Click here" onclick= "searchCompany()" class="btn"/>
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
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=companyStatistics';?>"><?php echo COMPANY_STATISTICS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=companyMain';?>"><?php echo COMPANY_MANAGE; ?></a>
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

