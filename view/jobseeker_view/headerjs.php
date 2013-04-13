<?php
ini_set("display_errors","1"); 
ini_set( 'error_reporting', "E_ALL" );
session_start();
if(isset($_SESSION['DISPLAY_NAME_SESSION'])) {
?>
<div id="header">
    <div class="wrapper">
        <div class="holder">
            <h1 class="logo"><a href="indexMain.php?controller=index&function=landingPage">Job Portal</a></h1>
            <div class="login-block">
				<?php require_once("config/constants.php");
					  require VIEW_PATH.'checkSession.php';
				?>
                <pre><b>Hello , <?php echo $_SESSION['DISPLAY_NAME_SESSION'];?></b></pre>
                <pre><b><a href="view/logout.php">Logout</a></b>
                </pre>
            </div>
        </div>
        <ul id="nav">
            <li><a href="indexMain.php?controller=viewjobseeker&function=display">View Profile</a></li>
            <li><a href="indexMain.php?controller=pages&function=updatePersonal">Update Personal</a></li>
            <li><a href="indexMain.php?controller=pages&function=updateEducational">Update Educational</a></li>
            <li><a href="indexMain.php?controller=pages&function=updateProfessional">Update Professional</a></li>
            <li><a href="indexMain.php?controller=pages&function=jobsearch">Search Jobs</a></li>
            <li><a href="indexMain.php?controller=jobsappliedseeker&function=retrieve">Jobs Applied</a></li>
            <li><a href="indexMain.php?controller=pages&function=faq">FAQ</a></li>
        </ul>
    </div>
</div>
<?php } else {  //header for guest?>
<div id="header">
    <div class="wrapper">
        <div class="holder">
            <h1 class="logo"><a href="indexMain.php?controller=index&function=landingPage">Job Portal</a></h1>
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
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>"><?php echo ABOUT_US;?></a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showContactUs';?>"><?php echo CONTACT_US;?></a></li>
			</ul>
    </div>
</div>

<?php } ?>
