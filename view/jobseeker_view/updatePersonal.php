<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>


	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>stylejs.css" />	
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.main.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js" ></script>
	<!--<script type="text/javascript" src="<?php echo JS_PATH;?>scriptUpdateJobSeeker.js" ></script>
	
<!--for dob but validations not working-->

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />	
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
$( "#dob" ).datepicker({ dateFormat: "yy-mm-dd",changeYear: true,changeMonth: true });
});
</script>

<!--ajax script for result of update educational-->
	<script>
		$(document).ready(function(){
		$("#update").click(function(){
			$.ajax({
				type:"POST",		
				url:"<?php echo SITE_PATH;?>indexMain.php?controller=updatejobseeker&function=personal", 
				data:$("#frmPersonal").serialize(),  
				success:function(result){  
					alert(result);
					//redirect to view details page here if needed
				}
			});//ajax function ends here
		});//button click ends here
		});//document.ready ends here
	</script>

</head>
<body>
	

	<?php  include 'headerjs.php';?>
	
	<div id="main">
		<div class="container">
		
			<div class="personal">
				<div class="title">
						<h2>Personal<span>Details</span></h2>
				</div>
				<form class="search-form"  id="frmPersonal" method="post">
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
									<input type="button" id="update" value="Update My Details" class="submit"/>
								</div>
							</div>
							<div class="columnR">
								<?php // print_r($arrData);?>
								<div class="row">
									<span class="text"><input type="text" class="text" name="fname" value="<?php if($arrData['firstname']==''){echo "";} else {echo $arrData['firstname'];}?>" id="fname"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="mname" value="<?php if($arrData['middlename']==''){} else {echo $arrData['middlename'];}?>" id="mname"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="lname"  value="<?php echo $arrData['lastname'];?>" id="lname"/></span>
								</div>
								<div class="row">
									<select name="gender" id="gender">
										<option class="default"></option>
										<?php if (!empty($arrData['gender'])) {  ?> 
    										<option value="<?php if ($arrData['gender']== 10) {echo "Male";$gender="Male";} else {echo "Female";$gender="Female";}?>" selected = "selected"><?php echo $gender?></option>  
    									<?php } ?>
										<option>MALE</option>
										<option>FEMALE</option>
									</select>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="dob" value="<?php echo $arrData['date_of_birth'];?>" id="dob"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="phno"  value="<?php echo $arrData['contact_number'];?>" id="phno"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="paddress" value="<?php echo $arrData['permanent_address'];?>" id="paddress"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="caddress"  value="<?php echo $arrData['current_address'];?>" id="caddress"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="city"  value="<?php echo $arrData['current_city'];?>" id="city"/></span>
								</div>

								<div class="row">
									<span class="text"><input type="text" class="text" name="state"  value="<?php echo $arrData['current_state'];?>" id="state"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="pincode"  value="<?php echo $arrData['pincode'];?>" id="pincode"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="country"  value="<?php echo $arrData['country'];?>" id="country"/></span>
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
	<?include_once("footer.html");?>

</body>
</html>
