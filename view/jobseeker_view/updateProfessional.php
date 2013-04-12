<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'stylejs.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js" ></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'scriptUpdateJobSeekerProfessional.js';?>></script>

	<script>
		function checkValueIndustry(val)
		{
    			if(val==="others")
       			document.getElementById('industry').style.display='block';
    			else
       			document.getElementById('industry').style.display='none'; 
		}
	</script>
	
	<!--ajax script for result of update professional-->
	<script>
		$(document).ready(function(){
		$("#update").click(function(){
			$("#frmUpdateProfessional").valid();
			$.ajax({
				type:"POST",		
				url:"<?php echo SITE_PATH;?>indexMain.php?controller=updatejobseeker&function=professional", 
				data:$("#frmUpdateProfessional").serialize(),  
				success:function(result){  
					alert(result);
					}
			});//ajax function ends here
		});//button click ends here
		});//document.ready ends here
	</script>
</head>
<body>
	<?include_once("headerjs.php");?>

	<div id="main">
	 
		<div class="container">
		
			<div class="personal" >
				<div class="title">
						<h2>Professional<span>Details</span></h2>
				</div>
				<form class="search-form" id="frmUpdateProfessional" method="post">
					<fieldset>
							<div class="columnL">
								<div class="row">
									<?php echo EXP ;?>
								</div>
								<div class="row">
									<?php echo KEY_SKILLS ;?>
								</div>
								<div class="row">
									<?php echo INDUSTRY ;?>
								</div>
								<div class="row">
									<?php echo FUNCTIONAL_AREA ;?>
								</div>
								
  								<div class="row">
									<input type="button" id="update" value="Update My Details" class="submit" />
								</div>
							</div>
							<div class="columnR">
								<?php //print_r($arrData);?>
								<div class="row">
									<span class="text"><input type="text" class="text" name="exp" value="<?php echo $arrData['experience'];?>" id="exp"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="keySkills" value="<?php echo $arrData['keyskills'];?>" id="keySkills"/></span>
								</div>
								<div class="row">
									<select name="industry" onchange='checkValueIndustry(this.value);'> 
    										<option></option>  
    										<?php if (!empty($arrData['current_industry'])) {  //default combo box value?> 
    										<option value="<?php echo $arrData['current_industry']?>" selected = "selected"><?php echo $arrData['current_industry']?></option>  
    									<?php } ?>
    										<option value="IT-Software Development">IT-Software Development</option>
    										<option value="IT-NETWORKING">IT-NETWORKING</option>
											<option value="IT-DATABASE_CONSULTING">IT-DATABASE_CONSULTING</option>
											<option value="IT-DOMAIN_MANAGEMT">IT-DOMAIN_MANAGEMT</option>
											<option value="FINANCE">FINANCE</option>
    										<option value="others">others</option>
									</select> 
									<input type="text" name="txtindustry" id="industry" style="display: none;"/>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="functionalArea" value="<?php echo $arrData['functional_area'];?>" id="functionalArea"/></span>
								</div>
								
								<div class="row">
									<input type="reset" value="Reset The Values" class="submit" />
								</div>
							</div>

										
					</fieldset>
				</form>
				
				<form id="frmUploadResume" class="search-form" enctype="multipart/form-data" action="indexMain.php?controller=updatejobseeker&function=resume" method="POST">
				<h2>Upload a New Resume ?</h2><br />
				Please choose a file: <input name="uploaded" type="file" /><br />
				<input type="submit" value="Upload" />
				</form> 

				</div>
			</div>

			
		

		
	</div>
	<?php require_once(VIEW_PATH."footer.php");?>

</body>
</html>
