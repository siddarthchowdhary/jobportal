<!--correct this page paths and attach it to the create account link in the home page-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery-1.7.1.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery.main.js';?>"></script>
	<script src="js/jquery.validate.pack.js" type="text/javascript"></script>
    <script src="js/scriptRegisterJobSeeker.js" type="text/javascript"></script>
	<script type="text/javascript" src="../../js/jquery.main.js"></script>
</head>
<body>
	<?php include_once("header.php");?>
	<div id="main">
		<div class="wrapper" style="height:400px;">
			<span><h3>Basic Registration  - Employer</h3></span>
        <div id="frmRegister" >
        <form action="indexMain.php?controller=register&function=registrationProcess" id="frmRegisterJobSeeker" method="post">
            <table class="frmregisteremp">
                <tr>
                    <td><label for="firstName"><strong>First Name: <em>*</em></strong></label></td>
                    <td><input type="text" name="firstName" id="firstName" onblur="requireValidator(this)"></td>
                    
                </tr>
                <tr>
                    <td><label for="lastName"><strong>Last Name: <em>*</em></strong></label></td>
                    <td><input type="text" name="lastName" id="lastName" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="email"><strong>Email id: <em>*</em></strong></label></td>
                    <td><input type="text" name="email" id="email" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="password"><strong>Password : <em>*</em></strong></label></td>
                    <td><input type="password" name="password" id="password" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="confirmPassword"><strong>Confirm Password : <em>*</em></strong></label></td>
                    <td><input type="password" name="confirmPassword" id="confirmPassword" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="companyName"><strong>Company Name: <em>*</em></strong></label></td>
                    <td><input type="text" name="companyName" id="companyName" onblur="requireValidator(this)" onkeyup="checkAvailability(this.value)"></td>
                </tr>
                <tr>
                    <td><label for="contactNumber"><strong>Contact Number: <em>*</em></strong></label></td>
                    <td><input type="text" name="contactNumber" id="contactNumber" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><input type="submit" /></td>
                    <td><input type="reset" /></td>
                </tr>
            </table>
        </form>
        </div>
	
		</div>
	</div>
	<?php include_once("footer.php");?>

</body>
</html>
