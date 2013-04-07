
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="#">Job Portal</a></h1>
				<div class="login-block">
					<?php
						//session_start();
						//require_once("config/constants.php");
						require VIEW_PATH.'checkSession.php';
					?>
					<pre><b>Hello , <?php echo $_SESSION['DISPLAY_NAME_SESSION'];?></b></pre>
					<pre><b><a href="view/logout.php">Logout</a></b></pre>
				</div>
			</div>
			<ul id="nav">
				<li><a href="indexMain.php?controller=job&function=searchPanel">Home</a></li>
				<li><a href="indexMain.php?controller=job&function=showAll">My Jobs</a></li>
				<li><a href="indexMain.php?controller=job&function=searchPanel">Search Resume</a></li>
				<li><a href="indexMain.php?controller=employerDetails&function=display">Account Settings</a></li>
				<li><a href="#">FAQ</a></li>
			</ul>
		</div>
	</div>
