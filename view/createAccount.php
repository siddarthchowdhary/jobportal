<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>style.css" />
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.1.min.js"></script>
	<script src="<?php echo JS_PATH;?>jquery.validate.pack.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH;?>scriptRegisterJobSeeker.js" type="text/javascript"></script> <!-- own sript for validation-->
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
					//$("#employer").hide();
					$("#btnHome").show();
					
				}
			});//ajax function ends here
			
		}
		function checkValueCompanyName(val)
		{
			if(val==="Others")
       			document.getElementById('companyRegister').style.display='block';
    		else
       			document.getElementById('companyRegister').style.display='none';
		}
		
		function btnHomeClick()
		{
			window.location.href="indexMain.php";
		}
	</script>
	<script>
        $(document).ready(function(){
        $("#register").click(function(){
            $("#frmRegisterJobSeeker").valid();           //frmRegisterJobSeeker
            $.ajax({
                type:"POST",       
                url:"<?php echo SITE_PATH;?>indexMain.php?controller=registerjobseeker&function=verify",
                data:$("#frmRegisterJobSeeker").serialize(), 
                success:function(result){ 
                    if (result=='Registration Successful. Message has been sent') {
                        $("#jobseeker").hide();
                        $("#employer").hide();
                        $("#btnJobSeeker").hide();
                        $("#btnEmployer").hide();
                        $("#btnHome").show();
                    }
                    $("#result").html(result);
                }
            });//ajax function ends here
        });//button click ends here
       
	  $("#btnHome").hide();
	  $("#employer").hide();
	  //$("#jobseeker").hide();  //by default jobseeker is visible
	  $("#btnJobSeeker").click(function(){
	    $("#employer").hide();
	    $("#jobseeker").show();
	  });
	  $("#btnEmployer").click(function(){
	    $("#jobseeker").hide();
	    $("#employer").show();
	  });
	
        });//document.ready ends here
    </script>
	
</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="#">Job Portal</a></h1>
				<div class="login-block">
					<?php if (isset($_SESSION['email'])) { ?>
					<pre>hi <?php echo $_SESSION['displayname'];?></pre>
					<pre>Logout
					</pre>
					<?php } else { ?>
				
					<a href="indexMain.php?controller=pages&function=createaccount" class="account">Create account</a>
					<span class="sign"><span>Sign in</span></span>
					<form class="sign-form" action=<?php echo SITE_PATH.'indexMain.php?controller=login&function=authenticate';?> method="post">
						<fieldset>
							<div class="row">
								<span class="text"><input type="text" name="email" value="email"/></span>
								<span class="text"><input type="password" name="password" value="password"/></span>
								<input type="submit" value="Go" class="submit" />
							</div>
							<div class="row">
								<br><span id="login_error" style="color:red;font-size:13px;">
								<?php if (isset($arrData['error'])) echo $arrData['error'];?>
								</span>
							</div>
						</fieldset>
					</form>		
					
					<?php } ?>

				</div>
			</div>
			<ul id="nav">
				<li><a href="<?php echo SITE_PATH.'indexMain.php';?>">Home</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=jobsearch&function=searchguest';?>">Job Seekers</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=resumeSearch&function=searchPannel';?>">Employers</a></li>
				<li><a href="#">Career advice</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">About Us</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showContactUs';?>">Contact Us</a></li>
			</ul>
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
        <form action="" id="frmRegisterJobSeeker" method="post">
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
                    <td><input type="button" id="register" value="Register"/></td>
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
					<td><input type="password" name="passwordEmployer" id="passwordEmployer" ></td>
				</tr>
				<tr>
					<td><label for="confirmPassword"><strong>Confirm Password : <em>*</em></strong></label></td>
					<td><input type="password" name="confirmPasswordEmployer" id="confirmPasswordEmployer" ></td>
				</tr>
				<tr>
					<td><label for="companyName"><strong>Company Name: <em>*</em></strong></label></td>
					<td>
						<select id="companyName" name="companyName" onchange='checkValueCompanyName(this.value)'>
							<option class="default">OSSCube</option>
							<?php
								while (list($key,$val)=each($arrData)) {
								echo "<option>".$val."</option>";
								}
							?>
							<option>Others</option>
						</select>
					</td>
					<td>
						<a id="companyRegister" href="indexMain.php?controller=registerCompany&function=registerCompanyForm" style="display: none;color: blue;">Click here to register your company</a>
						</td>
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
