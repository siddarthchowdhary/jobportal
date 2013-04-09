<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href=<?php echo CSS_PATH;?>style.css />
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.main.js"></script>
	<script src="<?php echo JS_PATH;?>jquery.validate.pack.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATH;?>scriptjobSearchjobSeeker.js" type="text/javascript"></script>  <!--own sript for validation-->
</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="#">Job Portal</a></h1>
				<div class="login-block">
					<?php if (isset($_SESSION['email'])) { ?>
					<pre>hi username thru session</pre>
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
								<label for="check-1">Remember me</label>
								<input type="checkbox" class="check" id="check-1" />
								<a href="#">Forgot your password?</a>
							</div>
						</fieldset>
					</form>		
					
					<?php } ?>

				</div>
			</div>
			<ul id="nav">
				<li><a href="<?php echo SITE_PATH.'indexMain.php';?>">Home</a></li>
				<li><a href="#">Job Seekers</a></li>
				<li><a href="#">Employers</a></li>
				<li><a href="#">Career advice</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">About Us</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showContactUs';?>">Contact Us</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
