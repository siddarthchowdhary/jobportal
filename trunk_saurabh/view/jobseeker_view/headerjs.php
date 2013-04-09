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
			</div>
        </div>
        
    </div>
</div>

<?php } ?>
