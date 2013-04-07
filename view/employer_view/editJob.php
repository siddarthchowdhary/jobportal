<!--correct this page paths and attach it to the create account link in the home page-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="css/style.css" />
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
			<span><h3>EDIT POST</h3></span>
        <div id="frmRegister" >
        <form action="indexMain.php?controller=job&function=updateJob" id="frmRegisterJobSeeker" method="post">
			<?php //echo '<pre>';print_r($arrData);//</pre>?>
            <table class="frmregisteremp">
				<tr><td><input type="hidden" name="jobId" value="<?php echo $arrData[0]['id'];?>"/></td></tr>
                <tr>
                    <td><label for="postName"><strong>Post Name: <em>*</em></strong></label></td>
                    <td><input type="text" name="postName" id="postName" value="<?php echo $arrData[0]['name_of_post'];?>" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="experience"><strong>Experience : <em>*</em></strong></label></td>
                    <td><input type="text" name="experience" id="experience" value="<?php echo $arrData[0]['experience_required'];?>" onblur="requireValidator(this)">year(s)</td>
                </tr>
                <tr>
                    <td><label for="dateOfLastApplying"><strong>Date Of Last Applying : <em>*</em></strong></label></td>
                    <td><input type="text" name="dateOfLastApplying" id="dateOfLastApplying" value="<?php echo $arrData[0]['date_of_last_applying'];?>" onblur="requireValidator(this)">YYYY-MM-DD</td>
                </tr>
                <tr>
                    <td><label for="expectedSalary"><strong>Expected Salary : <em>*</em></strong></label></td>
                    <td><input type="text" name="expectedSalary" id="expectedSalary" value="<?php echo $arrData[0]['expected_salary'];?>" onblur="requireValidator(this)">per annum</td>
                </tr>
                <tr>
                    <td><label for="jobDescription"><strong>Job Description : <em>*</em></strong></label></td>
                    <td><input type="text" name="jobDescription" id="jobDescription" value="<?php echo $arrData[0]['job_description'];?>" onblur="requireValidator(this)" onkeyup="checkAvailability(this.value)"></td>
                </tr>
                <tr>
                    <td><label for="jobLocation"><strong>Job Location : <em>*</em></strong></label></td>
                    <td><input type="text" name="jobLocation" id="jobLocation" value="<?php echo $arrData[0]['job_location'];?>" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="jobCategory"><strong>Job Category : <em>*</em></strong></label></td>
                    <td><input type="text" name="jobCategory" id="jobCategory" value="<?php echo $arrData[0]['job_category'];?>" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="keywords"><strong>Keywords : <em>*</em></strong></label></td>
                    <td><input type="text" name="keywords" id="keywords" value="<?php echo $arrData[0]['keywords'];?>" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
					<td><input type="submit" value="Update"/></td>
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
