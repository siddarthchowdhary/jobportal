<?php require_once 'config/constants.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>style.css" />
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.1.min.js"></script>
	<script src="<?php echo JS_PATH;?>jquery.validate.pack.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH;?>scriptRegisterJobSeeker.js" type="text/javascript"></script>  <!--own sript for validation-->
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.main.js"></script>
	<!--own sript for captcha-->
	<script type="text/javascript">  
		function imageReload()
			{
				img = document.getElementById("captcha");
				img.src="captcha_image.php?x=" + Math.random();
			}
	</script>
	
</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="">Job Portal</a></h1>
			</div>
		</div>
	</div>

	<div id="main">
		<div class="wrapper" style="height:400px;">
			<div id="own">
			<span><h3>Basic Registration  - Job Seeker</h3></span>
        <div id="frmRegister" >
        <form action="../../indexMain.php?controller=registerjobseeker&function=verify" id="frmRegisterJobSeeker" method="post">
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
	</div>  <!--div own ends here-->
		</div>
	</div>
	<div id="footer">
		<div class="holder">
			<div class="info">
				<span class="copy">Copyright (c) 2009 <a href="mailto:&#100;&#101;&#115;&#105;&#103;&#110;&#121;&#111;&#117;&#114;&#119;&#097;&#121;&#046;&#110;&#101;&#116;">&#100;&#101;&#115;&#105;&#103;&#110;&#121;&#111;&#117;&#114;&#119;&#097;&#121;&#046;&#110;&#101;&#116;</a></span>
				<ul>
					<li><a href="#">Terms of use</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Disclaimer</a></li>
				</ul>
			</div>
			<ul class="footer-nav">
				<li><a href="#">Home</a></li>
				<li><a href="#">Job seekers</a></li>
				<li><a href="#">Employers</a></li>
				<li><a href="#">Career Advice</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Newsletter</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>
	</div>

</body>
</html>
