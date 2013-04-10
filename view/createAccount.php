<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>style.css" />
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.1.min.js"></script>
	<script src="<?php echo JS_PATH;?>jquery.validate.pack.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH;?>scriptRegisterJobSeeker.js" type="text/javascript"></script>  <!--own sript for validation-->
    <script src="<?php echo JS_PATH;?>scriptRegisterEmployer.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.main.js"></script>
	<!--own sript for captcha-->
	<script type="text/javascript">  
		function imageReload()
		{
			img = document.getElementById("captcha");
			img.src="view/captcha_image.php?x=" + Math.random();
		}
		function imageReloadEmployer()
		{
			img = document.getElementById("captchaEmployer");
			img.src="view/captcha_image.php?x=" + Math.random();
		}
		function registerEmployer()
		{
			$("#frmRegisterEmployer").valid();
			$.ajax({
				type:"POST",		
				url:"<?php echo SITE_PATH;?>indexMain.php?controller=registerEmployer&function=registrationProcess", 
				data:$("#frmRegisterEmployer").serialize(),  
				success:function(result)
				{
					//alert(result);
					$("#result").html(result);
					$("#employer").hide();
					$("#btnHome").show();
					
				}
			});//ajax function ends here
			
		}
		function btnHomeClick()
		{
			window.location.href="indexMain.php";
		}
	</script>
	<!--own script for div showing and hiding-->
	<script>
	$(document).ready(function(){
	  $("#employer").hide();
	  $("#btnHome").hide();
	  $("#btnJobSeeker").click(function(){
	    $("#employer").hide();
	    $("#jobseeker").toggle();
	  });
	  $("#btnEmployer").click(function(){
	    $("#jobseeker").hide();
	    $("#employer").toggle();
	  });
	});
	</script>
	
</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="indexMain.php?controller=index&function=landingPage">Job Portal</a></h1>
			</div>
		</div>
	</div>

	<div id="main">
		<div class="wrapper" style="height:400px;">
			<input type="button" id="btnJobSeeker" value="I am a Job Seeker !"/>
			<input type="button" id="btnEmployer" value="I am an Employer !"/>
			<div id="result" style="color:red;"></div>
			<div id="jobseeker">
			<span><h3>Basic Registration  - Job Seeker</h3></span>
        <div id="frmRegister" >
        <form action="indexMain.php?controller=registerjobseeker&function=verify" id="frmRegisterJobSeeker" method="post">
            <table class="frmregisteremp">

                <tr>
                    <td><label for="firstname"><strong>First Name: <em>*</em></strong></label></td>
                    <td><input type="text" name="firstname"></td>
                </tr>
                <tr>
                    <td><label for="lastname"><strong>Last Name: <em>*</em></strong></label></td>
                    <td><input type="text" name="lastname"></td>
                </tr>
                <tr>
                    <td><label for="email"><strong>Email id: <em>*</em></strong></label></td>
                    <td><input type="text" name="email"></td>
				</tr>
                <tr>
                    <td><label for="password"><strong>Password : <em>*</em></strong></label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td><label for="confirmPassword"><strong>Confirm Password : <em>*</em></strong></label></td>
                    <td><input type="password" name="confirmPassword" id="confirmPassword"></td>
                </tr>
                <tr style="text-align:center">
					<td ><h2>CAPTCHA *</h2></td>
                </tr>
                <tr>
                    <td><img src="view/captcha_image.php" id="captcha"/></td>
					<td><input type="text" name="captcha" id="captcha"/></td>
					<td><input type="button" value="See Another" onclick="imageReload()"/></td>
                </tr>
                <tr>
                    <td><input type="submit" /></td>
                </tr>
            </table>
        </form>
        </div>
	</div>     <!--div job seeker ends here-->

	<div id="employer">
	<span><h3>Basic Registration  - Employer</h3></span>
	<div id="frmEmployer" >
		<form action="" id="frmRegisterEmployer" method="post">
			<table class="frmregisteremp">
				<tr>
					<td><label for="firstName"><strong>First Name: <em>*</em></strong></label></td>
					<td><input type="text" name="firstName" id="firstName" ></td>
				</tr>
				<tr>
					<td><label for="lastName"><strong>Last Name: <em>*</em></strong></label></td>
					<td><input type="text" name="lastName" id="lastName" ></td>
				</tr>
				<tr>
					<td><label for="gender"><strong>Gender: <em>*</em></strong></label></td>
					<td>
						<select id="gender" name="gender">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="email"><strong>Email id: <em>*</em></strong></label></td>
					<td><input type="text" name="email" id="email" ></td>
				</tr>
				<tr>
					<td><label for="password"><strong>Password : <em>*</em></strong></label></td>
					<td><input type="password" name="password" id="password" ></td>
				</tr>
				<tr>
					<td><label for="confirmPassword"><strong>Confirm Password : <em>*</em></strong></label></td>
					<td><input type="password" name="confirmPassword" id="confirmPassword" ></td>
				</tr>
				<tr>
					<td><label for="companyName"><strong>Company Name: <em>*</em></strong></label></td>
					<td><input type="text" name="companyName" id="companyName" ></td>
				</tr>
				<tr>
					<td><label for="contactNumber"><strong>Contact Number: <em>*</em></strong></label></td>
					<td><input type="text" name="contactNumber" id="contactNumber" ></td>
				</tr>
				<tr style="text-align:center">
					<td ><h2>CAPTCHA *</h2></td>
                </tr>
                <tr>
                    <td><img src="view/captcha_image.php" id="captchaEmployer"/></td>
					<td><input type="text" name="captcha" id="captcha"/></td>
					<td><input type="button" value="See Another" onclick="imageReloadEmployer()"/></td>
                </tr>
                <tr>
					<td><input type="button" value="Register" onclick="registerEmployer()"/></td>
					<td><input type="reset" /></td>
				</tr>
			</table>
		</form>
	</div>
	</div> <!--div employer ends here-->
	<input type="button" value="Back To HOME" id="btnHome" onclick="btnHomeClick()"/>
	</div>
	
</div>
<?php include_once 'footer.php';?>
</body>
</html>
