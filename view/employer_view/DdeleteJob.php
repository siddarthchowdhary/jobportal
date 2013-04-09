<!--correct this page paths and attach it to the create account link in the home page-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="../../css/style.css" />
	<script type="text/javascript" src="../../js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.validate.pack.js" type="text/javascript"></script>
    <script src="js/scriptRegisterJobSeeker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../../js/jquery.main.js"></script>
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
			<span><h3>DELETE POST</h3></span>
        <div id="frmRegister" >
        <form action="../../indexMain.php?controller=job&function=deleteJob" id="frmRegisterJobSeeker" method="post">
            <table class="frmregisteremp">
				<tr>
                    <td><label for="jobId"><strong>Job ID: <em>*</em></strong></label></td>
                    <td><input type="text" name="jobId" id="jobId" placeholder="jobID" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
					<td><input type="submit" value="Delete"/></td>
                    <td><input type="reset" /></td>
                </tr>

            </table>
        </form>
        </div>
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
