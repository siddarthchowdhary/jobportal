<?php require_once'../config/constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="../css/stylejs.css" />
	<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="jquery.main.js"></script>
	<script type="text/javascript" src="jquery.validate.pack.js" ></script>
	<script type="text/javascript" src="scriptUpdateJobSeeker.js" ></script>
	
</head>
<body>
	<?php include '../view/jobseeker_view/headerjs.php';?>
	<div id="main">
		<div class="container">
		
			<div class="personal">
				<div class="title">
						<h2>Personal<span>Details</span></h2>
				</div>
				<form class="search-form" action="#" id="frmPersonal" method="post">
					<fieldset>
							<div class="columnL">
								<div class="row">
									<?php echo FNAME ;?>
								</div>
								<div class="row">
									<?php echo MNAME ;?>
								</div>
								<div class="row">
									<?php echo LNAME ;?>
								</div>
								<div class="row">
									<?php echo GENDER ;?>
								</div>
								<div class="row">
									<?php echo DOB;?>
								</div>
								<div class="row">
									<?php echo PHNO;?>
								</div>
								<div class="row">
									<?php echo PADDRESS;?>
								</div>
								<div class="row">
									<?php echo CADDRESS;?>
								</div>
								<div class="row">
									<?php echo CITY;?>
								</div>

								<div class="row">
									<?php echo STATE;?>
								</div>
								<div class="row">
									<?php echo PINCODE;?>
								</div>
								<div class="row">
									<?php echo COUNTRY;?>
								</div>
								<div class="row">
									<input type="submit" value="Update My Details" class="submit"/>
								</div>
							</div>
							<div class="columnR">
								<div class="row">
									<span class="text"><input type="text" class="text" name="fname" id="fname"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="mname" id="mname"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="lname" id="lname"/></span>
								</div>
								<div class="row">
									<select name="gender" id="gender">
										<option class="default"></option>
										<option>MALE</option>
										<option>FEMALE</option>
									</select>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="dob" id="dob"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="phno" id="phno"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="paddress" id="paddress"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="caddress" id="caddress"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="city" id="city"/></span>
								</div>

								<div class="row">
									<span class="text"><input type="text" class="text" name="state" id="state"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="pincode" id="pincode"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="country" id="country"/></span>
								</div>
								<div class="row">
									<input type="reset" value="Reset The Values" class="submit" />
								</div>
							</div>

						</div>				
					</fieldset>
				</form>
				
			</div>

			
		

		</div>
	</div>
	<?include_once("../view/jobseeker_view/footer.html");?>

</body>
</html>
