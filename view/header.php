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
	<script>	//script to load ads and tip of the day	
	$(document).ready(function(){				
		$.ajax({								// function to load ads
	   			 type : "POST",
	    		 url  : 'indexMain.php?controller=HomePageAds&function=showAds',

	    		success : function(response)
	    		{
	    	
	        	$('.fadein ').append(response);
	        
	    		}
			});
			
			
		$.ajax({								// function to load tip of the day
	   			 type : "POST",
	    		 url  : 'indexMain.php?controller=HomePageAds&function=showTipOfDay',

	    		success : function(response)
	    		{
	    	
	        	$('.tipofday').html(response);
	        
	    		}
			});
	})
	</script>

</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="#">Job Portal</a></h1>
				<div class="login-block">
					
					<a href="indexMain.php?controller=createAccount&function=createAccount" class="account">Create account</a>
					<span class="sign"><span>Sign in</span></span>
					<form class="sign-form" action=<?php echo SITE_PATH.'indexMain.php?controller=login&function=authenticate';?> method="post">
						<fieldset>
							<div class="row">
								<span class="text"><input type="text" name="email" value="email"/></span>
								<span class="text"><input type="password" name="password" value="password"/></span>
								<input type="submit" value="Go" class="submit" />
							</div>
							<div class="row">
								<!--<label for="check-1">Remember me</label>
								<input type="checkbox" class="check" id="check-1" />
								<a href="#">Forgot your password?</a>-->
								<br><span id="login_error" style="color:red;font-size:13px;">
								<?php if (isset($arrData['error'])) echo $arrData['error'];?>
								</span>
							</div>
						</fieldset>
					</form>		
					
					

				</div>
			</div>
			<ul id="nav">
				<li><a href="<?php echo SITE_PATH.'indexMain.php';?>">Home</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=jobsearch&function=searchguest';?>"><?php echo JOBSEEKERS;?></a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=resumeSearch&function=searchPanel';?>"><?php echo EMPLOYERS;?></a></li>
				<li><a href="javascript:void(0)">Career advice</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>"><?php echo ABOUT_US;?></a></li>
				<li><a href="javascript:void(0)">FAQ</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showContactUs';?>"><?php echo CONTACT_US;?></a></li>
			</ul>
		</div>
	</div>

