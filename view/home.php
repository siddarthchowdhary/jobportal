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
								<form class="search-form" id="frmJobSearch" method="post" action="<?php echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=searchguest">
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
				
							<script>
                            $(function(){
                                $('.fadein img:gt(0)').hide();
                                setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
                            });
                            </script>
                            <!--ad images here-->
                            <div class="fadein">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job1.jpg">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job2.jpg">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job3.jpg">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job4.jpg">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job5.jpg">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job6.jpg">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job7.jpg">
                                <img src="<?php echo IMAGE_PATH;?>add_front_page/ad_job8.jpg">
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
