<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ABOUT US</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



        <link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/homepagenormalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagedemo.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagesidebar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent2_maincontent.css" />







        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/aboutnormalize.css">
        <link rel="stylesheet" href="css/aboutmain.css">
        
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <style type="text/css">
			body {
				font-family: 'Open Sans', sans-serif;
			}
		</style>




    </head>
    <body class="loading">
		<!-- navbar header -->

		<div class="navbar-wrapper">
			<div class="container">
				<div class="navbar navbar-fixed-top navbar-inverse navbar-static-top">
					<div class="navbar-header">
						<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php">Web RTC</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
							<li class="active"><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/aboutus.html">About</a></li>
							<li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/contactus.php">Contact</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php
								$cookie_name="logoutlink1";
								if(!isset($_COOKIE[$cookie_name])) {
									echo "<li><a href='http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/' alt='Logout'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>Logout&nbsp;&nbsp;</a></li>";
								} else {
									$link=$_COOKIE[$cookie_name];
								}
								echo "<li><a href='".$link."' alt='Logout from Facebook'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>Logout&nbsp;&nbsp;</a></li>";
							?>
						</ul>
					</div>
				</div>
			</div><!-- /container -->
		</div><!-- /navbar wrapper -->

		<!-- end of navbar -->











    
       	<main>
       	 
	        <section id="slide-1" class="homeSlide">
	        	<div class="bcg" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-1">
		        	<div class="hsContainer">
			    		<div class="hsContent" data-center="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-1 h2">
				    		<h2>About Project Name<br /><!-- they leave viewport --></h2>
				    		<p>This slide moves background image at a slower speed then the page scroll. Text is fading out to opacity 0 at 106 pixels from the top. Write about this project here. Probably Ask Palakh.</p>
			    		</div>

		        	</div>
	        	</div>
		    </section>
		    
		    <section id="slide-2" class="homeSlide">
		    	<div class="bcg" data-0="background-color:rgb(1,27,59);" data--25p-bottom="background-color:rgb(1,27,59);" data--90p-bottom="background-color:(0,0,0);"  data-anchor-target="#slide-2">
		    	<!-- <div class="bcg" data-0="background-color:rgb(1,27,59);" data-top="background-color:(0,0,0);"  data-anchor-target="#slide-2"> -->
			    	<div class="hsContainer">
			    		<div class="hsContent">
				    		<h2 data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2">The Team</h2>

				    		<!-- <p data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2">Text is fading in at 206 pixels from the bottom and fading out 106 pixels from the top. <br />Next slide fades in from black.</p> -->
				    		<div class="dev">

					    		<img src="aboutimg/dev-img/naman-dev.jpg" class="devimg" data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"></h2>
					    		<span class="caption" data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"></h2>Naman Avasthi<br>COO and CTO</span>
					    	</div>

					    	<div class="dev">
					    		<img src="aboutimg/dev-img/palakh-dev.jpg" class="devimg" data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"></h2>
					    		<span class="caption" data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"></h2>Palakh Jude<br>CEO and CIO</span>
					    	</div>

					    	<div class="dev">
					    		<img src="aboutimg/dev-img/rhea-dev.jpg" class="devimg" data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"></h2>
					    		<span class="caption" data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"></h2>Rhea Thomas<br>CFO and CRO</span>
					    	</div>

					    		<!-- <p data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"><b>Naman Avasthi</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Palakh Jude</b></p> -->

				    	</div> <!--end of dev div -->
			    		</div>
		        	</div>
		    	</div>
		    </section>
		    
			<section id="slide-3" data-content-offset="50p" class="homeSlide homeSlideTall2">
				<div class="bcg" 
					data-center="background-position: 0px 50%;" 
					data-bottom-top="background-position: 0px 40%;" 
					data-top-bottom="background-position: -40px 50%;" 
					data-anchor-target="#slide-3"
				>
			    	<div class="hsContainer">
			    		<div class="bcg bcg2" data-bottom-top="opacity: 1" data-top="opacity: 1;" data--150-top="opacity: 0" data-anchor-target="#slide-3">&nbsp;</div>
			    		<div class="hsContent">
			    			<div class="plaxEl" data-bottom-top="opacity: 0" data-top="opacity: 0" data--50p-top="opacity: 1; position: fixed; top: 206px; width: 100%; left: 0;" data--25p-bottom="opacity: 1;" data--50p-bottom="opacity: 0;" data-anchor-target="#slide-3">
					    		<h2>Our People</h2>
					    		<p><span class="bgBlack"><!-- Text is fixed 206 pixels from the top, while the background is moving 40 pixels to the left. --> Project Name's growing team is built to scale along with thousands of new customers every day. As a privately owned, founder-led company, we’re able to work fast and respond to our customers’ needs without anything getting in our way. We invest in engineering, research, customer support, and great design.</span></p>
					    		<!-- <p><span class="bgBlack">Or did you think that the scooter is driving off?</span></p> -->
				    		</div>
			    		</div>
			    	</div>
			    	
			    </div>
			</section>
		    
			<section id="slide-4" data-content-offset="90p" class="homeSlide homeSlideTall">
				<div class="bcg" data-bottom-top="background-position: 50% 100px" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-4">
					<div class="curtainContainer">
			
						<div class="curtain" data-bottom-top="opacity: 0; height: 1%;" data-106-top="height: 1%; opacity: 0; top: -10%;" data-center="height: 100%; opacity: 0.5; top: 0%;" data-top-bottom="height: 100%; opacity: 0.5; top: 0%;" data-anchor-target="#slide-4"></div>
						<div class="copy" data-bottom-top="opacity: 0" data--100-bottom="opacity: 0" data--280-bottom="opacity: 1;" data-280-top="opacity: 1;" data-106-top="opacity: 0;" data-anchor-target="#slide-4 .copy">
							<!-- <h2>Our Culture</h2> -->
						</div>
						<div class="copy" data-bottom-top="opacity: 0" data--50-bottom="opacity: 0" data--100-bottom="opacity: 1;" data-280-top="opacity: 1;" data-106-top="opacity: 0;" data-anchor-target="#slide-4 .copy"><h1>Our Culture</h1><p><br>We help our team members grow in their current roles and dream about what's next. ProjectName employees are encouraged to attend events, share what they do, and take time off to learn new skills. 
							<br><br>
							All of our employees participate in ProjectName University, an academic-style program that teaches professional communication and leadership skills.
							<br><br>
							ProjectName also hosts writers, designers, comedians, artists, and other interesting folks at our weekly Coffee Hour series, so we stay inspired by people in different industries.</p>
						
						
					</div>
				</div>
			</section>
		    

		    <section id="slide-5" data-content-offset="66p" class="homeSlide homeSlideTall2">
		    	<div class="bcg">
			    	&nbsp;
		    	</div>
		    	<div class="bcg bcg2" data-bottom-top="opacity: 0;" data--33p-top="opacity: 0;" data--66p-top="opacity: 1;" data-anchor-target="#slide-5">
			    	<div class="hsContainer">
				    	<div class="hsContent" data-bottom-top="opacity: 0;" data-center="opacity: 1" data-anchor-target="#slide-5">
				    		<h2>Like Us On</h2>
				    		<!-- <p>Showcase your beautiful images before blurring the scene and fading in your headline.</p> -->
				    		<img class="endimg" src="http://1.bp.blogspot.com/-WSdqH3gMHDk/U-xndvvQYrI/AAAAAAAABwg/9OLHbIjiTF8/s1600/facebook%2Blogo%2Bpng%2Btransparent%2Bbackground.png">
				    		<!-- <img class="ending" src="img/facebook-logo.jpg"> -->
				    		<img class="endimg2" src="aboutimg/google-logo.png">
				    		<img class="endimg" src="aboutimg/twitter-logo.png">
			    		</div>
			    	</div>
		    	</div>
		    	<div class="bcg bcg3" data-300-bottom="opacity: 0;" data-100-bottom="opacity: 1;" data-anchor-target="#slide-5">
			    	<div class="hsContainer">
				    	<div class="hsContent" data-100-bottom="opacity: 0;" data-bottom="opacity: 1;" data-anchor-target="#slide-5">
				    		<!-- <h2>Like Us On</h2> -->
				    		<!-- <img class="endimg" src="http://1.bp.blogspot.com/-WSdqH3gMHDk/U-xndvvQYrI/AAAAAAAABwg/9OLHbIjiTF8/s1600/facebook%2Blogo%2Bpng%2Btransparent%2Bbackground.png">
				    		<img class="ending" src="img/facebook-logo.jpg">
				    		<img class="endimg2" src="img/google-logo.png">
				    		<img class="endimg" src="img/twitter-logo.png"> --> 
				    		
				    		<br><br>
				    		
				    		<p>©2001-2015 All Rights Reserved. ProjectName® is a registered trademark of The Final Year Group 11. <!-- <a href="https://www.twitter.com/ihatetomatoes" target="_blank">@ihatetomatoes</a>. --></p>
			    		</div>
			    	</div>
		    	</div>
		    </section>
		    
		</main>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/min/aboutimagesloaded-min.js"></script>
        <script src="js/aboutwaypoints.min.js"></script>
        <script src="js/min/skrollr-min.js"></script>
       <!--  <script src="js/min/_main-min.js"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
		<script type="text/javascript" src="js/skrollr.ie.min.js"></script>
		<![endif]-->
        <script src="js/min/_main-min.js"></script>

    </body>
</html>
