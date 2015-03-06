<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<title>Search Result</title>
	

		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/searchnormalize.css" />
		
		<link rel="stylesheet" type="text/css" href="css/searchcomponent.css" />


		
		
		<link rel="webrtc icon" href="images/webrtc_ico.ico"/>



		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/homepagenormalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagedemo.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagesidebar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent2_maincontent.css" />

		<link rel="stylesheet" type="text/css" href="css/searchdemo.css" />

		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/snap.svg-min.js"></script>


<style>
			.badge-notify{
			   background:red;
			   position:relative;
			   top: -15px;
			   /*left: -35px;*/
			}

		</style>


		<style>
  .navbar-brand img{
    width: 45px;
    height: 35px;
    margin-top: -7px;
    margin-right: 3px;
    float: left;
  }
</style>

		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>







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
        <a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php"><img src="images/webrtc.png">Vid3Com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/aboutus/aboutus.html" target="ext">About</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/contactus.php">Contact</a></li>
            <li>
				<!-- <div class="container"> -->
				<a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/notifications.php">
					<!-- <button class="btn btn-default btn-lg btn-link" style="font-size:36px;"> -->
						<span class="glyphicon glyphicon-comment"></span>
						Notification
					<!-- </button> -->
					<!-- <span class="badge badge-notify"> -->
						<?php 
							//mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
							mysql_connect("localhost","root","");
							mysql_select_db("webrtc");
							$name=$_COOKIE['userdata']['email'];
							//$name='emma@gmail.com';
							$query = mysql_query("SELECT * FROM notifications WHERE username='$name' AND viewstatus<>'seen'");
							$count=mysql_num_rows($query);
							if ($count!=0) {
									echo "<span class='badge badge-notify'>$count</span>";
								}
						?>
					<!-- </span> -->
				<!-- </div> -->
				</a>
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








		<!-- this is for left sidebar -->
		<div class="container">
			<nav id="menu" class="menu">
				<button class="menu__handle"><span>Menu</span></button>
				<div class="menu__inner">
					<ul>
						<li><a href="#"><i class="fa fa-fw fa-home"></i><span>Home<span></a></li>
						<li><a href="#"><i class="fa fa-fw fa-heart"></i><span>Favs<span></a></li>
						<li><a href="#"><i class="fa fa-fw fa-folder"></i><span>Files<span></a></li>
						<li><a href="#"><i class="fa fa-fw fa-tachometer"></i><span>Stats<span></a></li>
					</ul>
				</div>
				<div class="morph-shape" data-morph-open="M300-10c0,0,295,164,295,410c0,232-295,410-295,410" data-morph-close="M300-10C300-10,5,154,5,400c0,232,295,410,295,410">
					<svg width="100%" height="100%" viewBox="0 0 600 800" preserveAspectRatio="none">
						<path fill="none" d="M300-10c0,0,0,164,0,410c0,232,0,410,0,410"/>
					</svg>
				</div>
			</nav>
			
		</div><!-- /container -->

<!-- 


Removed:  include('usercookie.php');




-->











<div class="container-fluid" style="height:720px">

		<div class="container">
		<?php
			//database connection
			//mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
			mysql_connect("localhost","root","");
			mysql_select_db("webrtc");
			
			$username= $_COOKIE['userdata']['email'];
			$sendername= $_COOKIE['userdata']['name'];
			$friendname= $_REQUEST['name'];
			$friendemailid= $_REQUEST['email'];
		
		
			if($friendemailid==$username)
				{
					echo"<h2><font color='blue'>You cannot add yourself! </h2>";
				}
				
			else 
			{	
				//$query=mysql_query("SELECT * FROM `users` WHERE `fullname` NOT IN (SELECT `friendname` FROM `friends` WHERE `userid`='$username')");
				$query=mysql_query("SELECT * FROM `friends` WHERE username='$sendername' AND friendname='$friendname'");
				$count=mysql_num_rows($query);
				WHILE ($rows=mysql_fetch_array($query)):
					$a=$rows['username'];
					echo $a;
					echo $count;
					$b=$rows['friendname'];
					echo $b;
					
				endwhile;
				//echo "Count from friends".$count;
				if($count==1)
				{
					echo"<h2><font color='blue'>You are already friends with $friendname!</font></h2>";
				}
				
				else 
				{
					$query1=mysql_query("SELECT * FROM `notifications` WHERE username='$friendemailid' AND friendrequestemailid='$username'");
					$count=mysql_num_rows($query1);
					echo $count;
					if($count>=1)
					{
						echo "<h2><font color='blue'>A request has already been sent!</font></h2>";
					}
					else 
					{
						
						//WHILE ($rows=mysql_fetch_array($query)):
						
				//if($friendname!=$rows['fullname']){
							$query2 = mysql_query("INSERT INTO friend_request (username,friendname) VALUES('$username','$friendemailid')");
							$query3= mysql_query("INSERT INTO notifications (username,missedcall,friendrequest,friendrequestemailid,viewstatus) VALUES('$friendemailid','','$sendername','$username','unseen')");
							echo"<h2><font color='blue'>Success! Your friend request has been sent to $friendname! </h2>";
					
					//endwhile;
					}
				
				}
			}
			
			
			
		?>
			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form" action="presearchresults.php">
					<input class="morphsearch-input" type="search" name='sval' placeholder="Search..."> 
					<!--<input class="morphsearch-input" type="search"></button>-->
					<button class="morphsearch-submit" type="submit">Search</button>
				</form>
			
				<!--<div class="morphsearch-content">
					 <div class="dummy-column">

					</div> 
					
				</div><!-- /morphsearch-content --> 
				<span class="morphsearch-close"></span>
			</div><!-- /morphsearch -->
			
			<div class="overlay"></div>
		</div><!-- /container -->
	</div> <!-- end of fluid div -->
		<script src="js/classie.js"></script>
		<script>
			(function() {
				var morphSearch = document.getElementById( 'morphsearch' ),
					input = morphSearch.querySelector( 'input.morphsearch-input' ),
					ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
					isOpen = isAnimating = false,
					// show/hide search area
					toggleSearch = function(evt) {
						// return if open and the input gets focused
						if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

						var offsets = morphsearch.getBoundingClientRect();
						if( isOpen ) {
							classie.remove( morphSearch, 'open' );

							// trick to hide input text once the search overlay closes 
							// todo: hardcoded times, should be done after transition ends
							if( input.value !== '' ) {
								setTimeout(function() {
									classie.add( morphSearch, 'hideInput' );
									setTimeout(function() {
										classie.remove( morphSearch, 'hideInput' );
										input.value = '';
									}, 300 );
								}, 500);
							}
							
							input.blur();
						}
						else {
							classie.add( morphSearch, 'open' );
						}
						isOpen = !isOpen;
					};

				// events
				input.addEventListener( 'focus', toggleSearch );
				ctrlClose.addEventListener( 'click', toggleSearch );
				// esc key closes search overlay
				// keyboard navigation events
				document.addEventListener( 'keydown', function( ev ) {
					var keyCode = ev.keyCode || ev.which;
					if( keyCode === 27 && isOpen ) {
						toggleSearch(ev);
					}
				} );


				/***** for demo purposes only: don't allow to submit the form *****/
				//morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			})();
		</script>
	</body>
</html>