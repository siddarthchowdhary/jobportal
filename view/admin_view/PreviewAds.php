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
	<script>	
	$(document).ready(function(){
		$.ajax({
	   			 type : "POST",
	    		 url  : 'indexMain.php?controller=HomePageAds&function=showAds',

	    		success : function(response)
	    		{
	    	
	        	$('.fadein ').append(response);
	        
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
					<?php if (isset($_SESSION['email'])) { ?>
					<pre>hi username thru session</pre>
					<pre>Logout
					</pre>
					<?php } else { ?>
				
					<a href="indexMain.php?controller=pages&function=createaccount" class="account">Create account</a>
					<span class="sign"><span>Sign in</span></span>
					<form class="sign-form" action=<?php echo SITE_PATH.'indexMain.php?controller=login&function=authenticate';?> method="post">
						<fieldset>
							<div class="row">
								<span class="text"><input type="text" name="email" value="email"/></span>
								<span class="text"><input type="password" name="password" value="password"/></span>
								<input type="submit" value="Go" class="submit" />
							</div>
							<div class="row">
								<label for="check-1">Remember me</label>
								<input type="checkbox" class="check" id="check-1" />
								<a href="#">Forgot your password?</a>
							</div>
						</fieldset>
					</form>		
					
					<?php } ?>

				</div>
			</div>
			<ul id="nav">
				<li><a href="<?php echo SITE_PATH.'indexMain.php';?>">Home</a></li>
				<li><a href="#">Job Seekers</a></li>
				<li><a href="#">Employers</a></li>
				<li><a href="#">Career advice</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">About Us</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showContactUs';?>">Contact Us</a></li>
			</ul>
		</div>
	</div>
		<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2>Job<span>Search</span></h2>
								</div>
								<form class="search-form" id="frmJobSearch" method="post" action="<?php echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=search">
									<fieldset>
										<div class="columns-holder">
											<div class="column">
												<div class="row">
													<label for="keyword">Enter keyword(s)</label>
													<span class="text">
														<input type="text" class="text" id="keywords" name="keywords"/>
													</span>
												</div>
												<div class="row">
													<label for="job-category">Select a job category</label>
													<select id="job-category" name="job-category">
														<option class="default"></option>
														<?php
														while (list($key,$val)=each($arrData)) {
															echo "<option>".$val."</option>";
														}
														?>
													</select>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="location">Location(City)</label>
													<span class="text">
														<input type="text" class="text" id="location" name="location"/>
													</span>
												</div>
												<div class="row">
													<label for="location">Experience (ex:0 for fresher)</label>
													<span class="text">
														<input type="text" class="text" id="experience" name="experience"/>
													</span>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="employer">Company Name</label>
													<span class="text">
														<input type="text" class="text" id="employer" name="employer"/>
													</span>
												</div>
												<div class="row">
													<input type="submit" value="Perform the search" class="submit" />
												</div>
											</div>
										</div>
										<ul class="sort-list">
											<li><a href="#">Advanced search</a></li>
											<li><a href="#">Browse by job category</a></li>
											<li><a href="#">Browse by location</a></li>
											<li><a href="#">Browse by employer</a></li>
										</ul>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>Featured<span>categories</span></h2>
							</div>
							<ul class="categories-list">
								<li>
									<span class="image-holder">
										<a href="#"><img src="images/img01.jpg" alt="image description" width="81" height="81" /></a>
									</span>
									<strong class="heading">Business</strong>
									<ul>
										<li>Project Manager</li>
										<li>Senior Business Analyst/Consultant</li>
										<li>Senior Business Analyst/Consultant</li>
									</ul>
									<div class="btn-holder">
										<a href="#">see more</a>
									</div>
								</li>
								<li>
									<span class="image-holder">
										<a href="#"><img src="images/img02.jpg" alt="image description" width="81" height="81" /></a>
									</span>
									<strong class="heading">Construction</strong>
									<ul>
										<li>Construction Laborer</li>
										<li>Construction PM/Estimator</li>
										<li>Construction Admin</li>
									</ul>
									<div class="btn-holder">
										<a href="#">see more</a>
									</div>
								</li>
								<li>
									<span class="image-holder">
										<a href="#"><img src="images/img03.jpg" alt="image description" width="81" height="81" /></a>
									</span>
									<strong class="heading">Customer service</strong>
									<ul>
										<li>Project Manager</li>
										<li>Senior Business Analyst/Consultant</li>
										<li>Senior Business Analyst/Consultant</li>
									</ul>
									<div class="btn-holder">
										<a href="#">see more</a>
									</div>
								</li>
								<li>
									<span class="image-holder">
										<a href="#"><img src="images/img04.jpg" alt="image description" width="81" height="81" /></a>
									</span>
									<strong class="heading">Food service</strong>
									<ul>
										<li>Project Manager</li>
										<li>Senior Business Analyst/Consultant</li>
										<li>Senior Business Analyst/Consultant</li>
									</ul>
									<div class="btn-holder">
										<a href="#">see more</a>
									</div>
								</li>
								<li>
									<span class="image-holder">
										<a href="#"><img src="images/img05.jpg" alt="image description" width="81" height="81" /></a>
									</span>
									<strong class="heading">Hotel service</strong>
									<ul>
										<li>Project Manager</li>
										<li>Senior Business Analyst/Consultant</li>
										<li>Senior Business Analyst/Consultant</li>
									</ul>
									<div class="btn-holder">
										<a href="#">see more</a>
									</div>
								</li>
								<li>
									<span class="image-holder">
										<a href="#"><img src="images/img06.jpg" alt="image description" width="81" height="81" /></a>
									</span>
									<strong class="heading">Professional</strong>
									<ul>
										<li>Project Manager</li>
										<li>Senior Business Analyst/Consultant</li>
										<li>Senior Business Analyst/Consultant</li>
									</ul>
									<div class="btn-holder">
										<a href="#">see more</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>Browse by<span>category</span></h2>
							</div>
							<div class="list-holder">
								<ul>
									<li>
										<div class="hover">
											<a href="#">Accounting (112)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Administration / Office support (23)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Construction, Building and architecture (321)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Education (223)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Hospitality, travel and tourism (452)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">IT and telecomunications (232)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Logistics, transport and suply (296)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Medical and healthcare (155)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
								</ul>
								<ul>
									<li>
										<div class="hover">
											<a href="#">Accounting (112)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Administration / Office support (23)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Construction, Building and architecture (321)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Education (223)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Hospitality, travel and tourism (452)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">IT and telecomunications (232)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Logistics, transport and suply (296)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="hover">
											<a href="#">Medical and healthcare (155)</a>
											<ul class="icos">
												<li><a href="#"><img src="images/ico03.gif" alt="image description" width="14" height="15" /><span class="tooltip">Subscribe to this category's RSS Feed</span></a></li>
												<li><a href="#"><img src="images/ico04.gif" alt="image description" width="24" height="19" /><span class="tooltip">Subscribe to this category’s newsletter</span></a></li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>Browse by<span>city</span></h2>
							</div>
							<div class="list-holder">
								<ul>
									<li><a href="#">Honolulu (112)</a></li>
									<li><a href="#">Hilo (23)</a></li>
									<li><a href="#">Waipahu (321)</a></li>
									<li><a href="#">Aiea (223)</a></li>
									<li><a href="#">Kailua (452)</a></li>
									<li><a href="#">Pearl City (232)</a></li>
									<li><a href="#">Princeville (296)</a></li>
									<li><a href="#">Waimea (155)</a></li>
								</ul>
								<ul>
									<li><a href="#">Honolulu (112)</a></li>
									<li><a href="#">Hilo (23)</a></li>
									<li><a href="#">Waipahu (321)</a></li>
									<li><a href="#">Aiea (223)</a></li>
									<li><a href="#">Kailua (452)</a></li>
									<li><a href="#">Pearl City (232)</a></li>
									<li><a href="#">Princeville (296)</a></li>
									<li><a href="#">Waimea (155)</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span>Testimonials</span></h2>
							</div>
							<div class="blockquote-section">
								<blockquote>
									<q>
										<span class="quote-holder">
											<span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span>
											<span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</span>
										</span>
									</q>
									<cite>James Cunnington, Managing director at OMV</cite>
								</blockquote>
								<blockquote>
									<q>
										<span class="quote-holder">
											<span>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique.</span>
											<span>Sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</span>
										</span>
									</q>
									<cite>Dan Ackles, Chef at the Palace Restaurant</cite>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar">
	
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3><span>Ads</span></h3>
							</div>
							<div class="fadein">
									 
							<!--	<img src=<?php echo ADS_IMAGE_PATH."ads1";?> alt="image description">
								<img src=<?php echo ADS_IMAGE_PATH."ads2";?> alt="image description1"> -->
							</div>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>Find a<span>job</span></h3>
							</div>
							<div class="info-text">
								<img src="images/img07.jpg" alt="image description" width="99" height="105" class="alignright" />
								<p>Post your resume on this site and get the chance to be seen by more than 500 companies</p>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
							<a href="#" class="btn">Post your resume</a>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>Post a<span>job</span></h3>
							</div>
							<div class="img-holder">
								<img src="images/img08.jpg" alt="image description" width="158" height="114" />
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
							<ul class="list">
								<li>Single job - only $ 10.99</li>
								<li>Your job live for 30 days</li>
								<li>CVs sent to your inbox</li>
							</ul>
							<a href="#" class="btn">Recruit now</a>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>Tip of<span>the day</span></h3>
							</div>
							<div class="article">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
							</div>
							<a href="#" class="btn">Next tip</a>
						</div>
					</div>
				</div>
				<div class="block">    <!--advertisement-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>Top<span>employers</span></h3>
							</div>
							<div class="area">
								<ul class="sponsors-list">
									<li><a href="#"><img src="images/sponsor-logo-01.jpg" alt="image description" width="66" height="25" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-02.jpg" alt="image description" width="66" height="47" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-03.jpg" alt="image description" width="66" height="34" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-04.jpg" alt="image description" width="66" height="34" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-05.jpg" alt="image description" width="66" height="33" /></a></li>
								</ul>
								<ul class="partners-list">
									<li><a href="#"><img src="images/partner-logo-01.jpg" alt="image description" width="84" height="21" /></a></li>
									<li><a href="#"><img src="images/partner-logo-02.jpg" alt="image description" width="64" height="24" /></a></li>
									<li><a href="#"><img src="images/partner-logo-03.jpg" alt="image description" width="56" height="32" /></a></li>
									<li><a href="#"><img src="images/partner-logo-04.jpg" alt="image description" width="88" height="37" /></a></li>
									<li><a href="#"><img src="images/partner-logo-05.jpg" alt="image description" width="74" height="18" /></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div> <!--advertisement till here-->
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
				<li><a href="<?php echo SITE_PATH.'indexMain.php';?>">Home</a></li>
				<li><a href="#">Job seekers</a></li>
				<li><a href="#">Employers</a></li>
				<li><a href="#">Career Advice</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Newsletter</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">About Us</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showContactUs';?>">Contact</a></li>
			</ul>
		</div>	
</div>
</body>
</html>
