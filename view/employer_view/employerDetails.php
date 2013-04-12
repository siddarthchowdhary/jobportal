<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery-1.7.1.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery.main.js';?>"></script>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<script src="<?php echo JS_PATH.'jquery.js';?>" type="text/javascript"></script>
    <script src="<?php echo JS_PATH.'jquery.dataTables.js';?>" type="text/javascript"></script>
	<script>
		function changePasswordForm()
		{
			$("#data").hide();
			$("#changePassword").show();
		}
		
		function changePassword()
		{
			$.ajax({
                type : "POST",
                url : 'indexMain.php?controller=employerDetails&function=changePassword',
                data : $("#frmChangePassword").serialize(),
                success : function(response)
                {
					alert(response);
                    window.location.href='indexMain.php?controller=employerDetails&function=display';
                }
            });
		}
		$(document).ready(function(){
			$("#changePassword").hide();
        })
	</script>
</head>
<body>
	<?include_once("headerEmployer.php");?>
	<div id="main">
		<div class="wrapper" >
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MY <span>DETAILS</span></h2>
							</div>
							<div id="data">
							<table class="display">
								<thead>
									<tr><th><?php echo MY_DETAILS;?></th></tr>
								</thead>
								<tbody>
									<?php
										echo '<tr>';
										echo '<td>';
										echo '<form action="indexMain.php?controller=employerDetails&function=editDetails" id="frmRegisterJobSeeker" method="post">';
										echo "<br>"."<b>".DISPLAY_NAME."</b>".$arrData['displayname'];
										echo "<br>"."<b>".COMPANY_NAME."</b>".$arrData['company_name'];
										echo "<br>"."<b>".EMAIL_EMPLOYER."</b>".$arrData['email'];
										echo "<br>"."<b>".CONTACT_NUMBER."</b>".$arrData['contact_number'];
										echo "<br>"."<b>".GENDER_EMPLOYER."</b>";
										if($arrData['gender']==10)
											echo MALE;
										else
											echo FEMALE;
										echo '<input type="hidden" name="employer_id" id="employer_id" value="'.$val['id'].'"/>';
										echo "<br>".'<input type="submit" value="'.EDIT_DETAILS_EMPLOYER.'"/>';
										echo '<input type="button" value="'.CHANGE_PASSWORD_EMPLOYER.'" onclick="changePasswordForm()"/>';
										echo '</form>';
										echo '</td>';
										echo '</tr>';
                                      ?>
                                </tbody>
							</table>
							</div>
							<div id="changePassword">
								<div class="wrapper" style="height:300px;">
									<span><h3><?php echo CHANGE_PASSWORD_EMPLOYER; ?></h3></span>
									<!--<div id="frmChangePassword" >-->
										<form action="" id="frmChangePassword" method="post">
											<table class="frmChangePassword">
												<tr>
													<td><label for="currentPassword"><strong></strong><?php echo CURRENT_PASSWORD_EMPLOYER; ?> <em>*</em></strong></label></td>
													<td><input type="password" name="currentPassword" id="currentPassword"></td>
												</tr>
												<tr>
													<td><label for="newPassword"><strong><?php echo NEW_PASSWORD_EMPLOYER;?><em>*</em></strong></label></td>
													<td><input type="password" name="newPassword" id="newPassword"></td>
												</tr>
												<tr>
													<td><label for="confirmPassword"><strong><?php echo CONFIRM_PASSWORD_EMPLOYER;?> <em>*</em></strong></label></td>
													<td><input type="password" name="confirmPassword" id="confirmPassword"></td>
												</tr>
											</table>
											<div class="row">
												<input type="button" value="<?php echo CHANGE_PASSWORD_EMPLOYER; ?>" onclick="changePassword()" class="submit" />
												<input type="reset" value="<?php echo RESET;?>"/>
											</div>
										</form>
									<!--</div>-->
								</div>
							</div><!--change Password-->
						</div>
					</div>
				</div>                 <!--one block till here-->
			</div>
			<div id="sidebar">
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>MY<span>SIDEBAR</span></h3>
							</div>
							<!--code here-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?include_once("footer.html");?>

</body>
</html>
