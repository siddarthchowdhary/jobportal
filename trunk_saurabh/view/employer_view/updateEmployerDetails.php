
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
	<script>
		function updateDetails()
		{
			$.ajax({
				type : "POST",
				url : 'indexMain.php?controller=employerDetails&function=updateDetails',
				data : $("#frmupdateEmployerDetails").serialize(),
				success : function(response)
				{
					alert(response);
					window.location.href="indexMain.php?controller=employerDetails&function=display";
					//$('#result').html(response);
				}
			});
		}
	</script>
</head>
<body>
	<?include_once("headerEmployer.php");?>
	<div id="main">
		<div class="wrapper" >
			<span><h3>Update Employer Details :</h3></span>
			<?php //echo "<pre>";print_r($arrData);//</pre>?>
			<div id="divupdateEmployerDetails" >
				<form action="" id="frmupdateEmployerDetails" method="post">
					<table class="frmupdateEmployerDetails">
						<tr>
							<td><label for="displayName"><strong>Display Name: <em>*</em></strong></label></td>
							<td><input type="text" name="displayName" id="displayName" value="<?php echo $arrData['displayname'];?>"></td>
						</tr>
						<tr>
							<td><label for="companyName"><strong>Company Name: <em>*</em></strong></label></td>
							<td><input type="text" name="companyName" id="companyName" value="<?php echo $arrData['company_name'];?>"></td>
						</tr>
						<tr>
							<td><label for="email"><strong>Email id: <em>*</em></strong></label></td>
							<td><input type="text" name="email" id="email" value="<?php echo $arrData['email'];?>"></td>
						</tr>
						<tr>
							<td><label for="contactNumber"><strong>Contact Number: <em>*</em></strong></label></td>
							<td><input type="text" name="contactNumber" id="contactNumber" value="<?php echo $arrData['contact_number'];?>"></td>
						</tr>
						<tr>
							<td><label for="gender"><strong>Gender: <em>*</em></strong></label></td>
							<td><select name="gender" id="gender">
									<option class="default">
									<?php 
										if ($arrData['gender']==10)
											echo "Male";
										else
											echo "Female";
									?>
									</option>
									<option>Male</option>
									<option>Female</option>
								</select>
						</td>
							
						</tr>
						
					</table>
					<div class="row">
						<input type="button" onclick="updateDetails()" value="Update Profile" class="submit" />
						<input type="reset" />
					</div>
				</form>
			</div>
		</div>
	</div>
    <?include_once("footer.html");?>
</body>
</html>
