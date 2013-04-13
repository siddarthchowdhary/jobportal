
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="indexMain.php">Job Portal</a></h1>
				<div class="login-block">
					<?php
						require VIEW_PATH.'checkSession.php';
					?>
					<pre><b>Hello , <?php echo $_SESSION['DISPLAY_NAME_SESSION'];?></b></pre>
					<pre><b><a href="view/logout.php"><?php echo LOGOUT;?></a></b></pre>
				</div>
			</div>
			<ul id="nav">
				<li><a href="indexMain.php?controller=resumeSearch&function=searchPanel"><?php echo HOME_EMPLOYER;?></a></li>
				<li><a href="indexMain.php?controller=job&function=showAll"><?php echo MY_JOBS_EMPLOYER;?></a></li>
				<li><a href="indexMain.php?controller=resumeSearch&function=searchPanel"><?php echo SEARCH_RESUME;?></a></li>
				<li><a href="indexMain.php?controller=employerDetails&function=display"><?php echo ACCOUNT_SETTINGS;?></a></li>
				<li><a href="indexMain.php?controller=pages&function=faqEmployer">FAQ</a></li>
			</ul>
		</div>
	</div>
