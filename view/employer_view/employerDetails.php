<?php #comment after merging
//require_once ("config/constants.php");?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php
               ini_set("display_errors","1");
               ini_set( 'error_reporting', "E_ALL" );
               require_once 'config/constants.php';
               //echo "correct path here";
       ?>
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
		function changePassword()
		{
			$("#data").hide();
			$("#changePassword").show();
		}
		$(document).ready(function(){
			$('#datatables').dataTable({
				"sPaginationType":"full_numbers",
                "aaSorting":[[2, "desc"]],
                "bJQueryUI":true
            });
            $("#changePassword").hide();
        })
	</script>
</head>
<body>
	<?include_once("headerEmployer.php");?>

	<div id="main">
		<div class="wrapper" style="height:320px;">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MY <span>DETAILS</span></h2>
							</div>
							<div id="data">
							<table id="datatables" class="display">
								<thead>
									<tr><th>MY Details</th></tr>
								</thead>
								<tbody>
									<?php
										echo '<tr>';
										echo '<td>';
										echo '<form action="indexMain.php?controller=employerDetails&function=editDetails" id="frmRegisterJobSeeker" method="post">';
										echo "<br>"."<b>Display Name:</b>".$arrData['displayname'];
										echo "<br>"."<b>Company Name:</b>".$arrData['company_name'];
										echo "<br>"."<b>Email :</b>".$arrData['email'];
										echo "<br>"."<b>Contact Number :</b>".$arrData['contact_number'];
										echo "<br>"."<b>Gender :</b>".$arrData['gender'];
										echo '<input type="hidden" name="employer_id" id="employer_id" value="'.$val['id'].'"/>';
										echo "<br>".'<input type="submit" value="Edit Details"/>';
										echo '<input type="button" value="Change Password" onclick="changePassword()"/>';
										echo '</form>';
										echo '</td>';
										echo '</tr>';
                                      ?>
                                </tbody>
							</table>
							</div>
							<div id="changePassword">
								<div class="wrapper" style="height:300px;">
									<span><h3>Change Password :</h3></span>
									<div id="frmChangePassword" >
										<form action="indexMain.php?controller=employerDetails&function=changePassword" id="frmChangePassword" method="post">
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
												<input type="submit" value="Change Password" class="submit" />
											</div>
										</form>
									</div>
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
