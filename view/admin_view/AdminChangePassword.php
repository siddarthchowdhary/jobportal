<?php
/* @author 		: Ashwani Singh
 * @date   		: 08-04-2013
 * @description : Admin Home Model 
 * @module		: Admin 
 * @modified on : 
*/
?>
<script>
function changePassword()
{
	$.ajax({
           type : "POST",
           url : 'indexMain.php?controller=AdminHome&function=changePassword',
           data : $("#frmChangePassword").serialize(),
           success : function(response)
            {
				alert(response);
				window.location.assign("indexMain.php?controller=AdminHome&function=display");
            }
           });
}
		
</script>
</head>
<body>
	<?include_once("header.php");?>
<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span><?php echo ADMIN_HOME; ?></span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
								<form action="" id="frmChangePassword" method="post">
									<table class="frmChangePassword">
										<tr>
											<td><label for="currentPassword"><strong>Current Password: <em>*</em></strong></label></td>
											<td><input type="password" name="currentPassword" id="currentPassword" onblur="requireValidator(this)"></td>
										</tr>
										<tr>
											<td><label for="newPassword"><strong>New Password: <em>*</em></strong></label></td>
											<td><input type="password" name="newPassword" id="newPassword" onblur="requireValidator(this)"></td>
										</tr>
										<tr>
											<td><label for="confirmPassword"><strong>Confirm Password: <em>*</em></strong></label></td>
											<td><input type="password" name="confirmPassword" id="confirmPassword" onblur="requireValidator(this)"></td>
										</tr>
									</table>
									<div class="row">
										<input class="admin_btn" type="button" value="Change Password" onclick="changePassword()" class="submit" />
										<input class="btn" type="reset" value="Reset"/>
									</div>
								</form>
							</div>	
						</div>
					</div>
				</div>
			</div>
	  </div>
<?include_once("footer.php");?>
