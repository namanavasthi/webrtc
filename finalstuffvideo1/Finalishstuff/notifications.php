<?php
include ('search.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>NOTIFICATIONS</title>

		<link rel="webrtc icon" href="images/webrtc_ico.ico"/>
	
		
		<style>
      div.container-fluid{
        /*margin: 0;*/
        background: url(http://img854.imageshack.us/img854/303/jlf5w.jpg);
    background-size: cover;
    background-repeat:no-repeat;
        /*background-size: 1440px 800px;*/
        /*background-repeat:no-repeat;*/
        /*display: compact;*/
      }
    </style>

		<script src="js/snap.svg-min.js"></script>


<!-- bootstrap scripts -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- end of bootstrap scripts -->


	<link rel="stylesheet" type="text/css" href="css/notidefault.css" />
		<link rel="stylesheet" type="text/css" href="css/noticomponent.css" />
		
		
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/homepagenormalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagedemo.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagesidebar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent2_maincontent.css" />

		<link rel="stylesheet" type="text/css" href="css/homepagedemo_rightbar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent_rightbar.css" />
		<link href="css/bootstrap.css" rel="stylesheet">

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
		
	</head>
		<body>
			<!-- ADDDDDDDEEEEEEEEEEEEEDDDDDDDDDDDD QUERY DB!!!!!!!!!! -->

<div id="auto"></div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.9.0.min.js"></script>
<script src="https://code.jquery.com/jquery-1.3.2.min.js"></script>
<script>
$(document).ready(function()
{
	$('#auto').load('load.php');
	refresh();
}
	);
	
function refresh()
{
	setTimeout(function() {
	$('#auto').load('load.php');
	refresh();
	},5000);
}


</script>


<!--till here!!!!!!!!! -->



<div class="container-fluid" style="height:720px">


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
				<li class="active">
					<!-- <div class="container"> -->
					<a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/notifications.php">
						<!-- <button class="btn btn-default btn-lg btn-link" style="font-size:36px;"> -->
							<span class="glyphicon glyphicon-comment"></span>
							Notification
						<!-- </button> -->
						
							<?php 
								mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
								mysql_select_db("webrtc");
								$name=$_COOKIE['userdata']['email'];
								//$name='emma@gmail.com';
								$query = mysql_query("SELECT * FROM notifications WHERE username='$name' AND viewstatus<>'seen'");
								$count=mysql_num_rows($query);
								if ($count!=0) {
									echo "<span class='badge badge-notify'>$count</span>";
								}
								 
							?>
						
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

















































<!-- right bar-->

<?php


	$a=$_COOKIE['userdata']['email'];
	//echo $name;
	$a=hash("md5",$a);
	//echo $name;
	//$query = mysql_query("SELECT * FROM friends WHERE userid='$a'");
	//$query = mysql_query("SELECT * FROM users");
	
	//ADDDDDDDDEEEEEEEEEEEEDDDDDDDDDDD TODAAAAAAAAAAYYYYYYYYYYY
	$query=mysql_query("SELECT `fullname`,`imagename`,`imagesmall` FROM `users` WHERE `status`='Online' AND `fullname` in (SELECT `friendname` FROM `friends` WHERE `userid`='$a')");
	
	
	$name=array();
	$image=array();
	$i=0;
	$count=mysql_num_rows($query);
	WHILE($rows = mysql_fetch_array($query)):
	
		$fullname = $rows['fullname'];
			//include('kiddingnext.php');
		$name[$i]=$fullname;
		if($rows['imagename'!=''])
		{
			$image[$i]='disim.php?id='.$name[$i];
		}
		else
		{
			$image[$i]=$rows['imagesmall'];
		}
		$i++;
		
	endwhile;
	
	
	//TO DISPLAY THE IMAGESSSSSSSSSSS!!!!!!!!!!!!!!!

	/*$query1 = mysql_query("SELECT `fullname`,`imagename`,`imagesmall` FROM `users` WHERE `fullname` in (SELECT `friendname` FROM `friends` WHERE `userid`='$a')");

	$image=array();
	$j=0;

	WHILE($rows = mysql_fetch_array($query1)):
		
		if($rows['imagename'=''])
		{
			$image[$j]='disim.php?id='.$name[$j];
			$j++;
		}
		else
		{
			$image[$j]=$rows['imagesmall'];
			$j++;
		}

		
	endwhile;
	
	
	
	//TILL HERE!!!!!!!!!!!
	*/
	//var_dump($name);
	//var_dump($image);
	
	//for($j=0;$j<=$count;$j++)
	
	if ($count==0) {
		echo "To add new friends, use the search bar above";
	}
		
	else if($count==1)
	{
		echo"
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-3 pull-right'>
				<div class='grid-wrap col-xs-push-5 col-sm-push-7 col-md-push-8 col-lg-push-8'>
					<div class='grid col-sm-4 col-md-3 col-lg-3'> 
					<figure><a href='profile.php?firstname=$name[0]'><img src='$image[0]' alt='img04'/><p>$name[0]</p></figure></a>   
					</div>
				</div><!-- /grid-wrap -->
			</div> <!-- div for right column -->
		</div> <!-- /row -->"; 

	}
	
	else if($count==2)
	{
		echo"
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-3 pull-right'>
				<div class='grid-wrap col-xs-push-5 col-sm-push-7 col-md-push-8 col-lg-push-8'>
					<div class='grid col-sm-4 col-md-3 col-lg-3'> 
					<figure><a href='profile.php?firstname=$name[0]'><img src='$image[0]' alt='img04'/><p>$name[0]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[1]'><img src='$image[1]' alt='img04'/><p>$name[1]</p></figure></a> 
					</div>
				</div><!-- /grid-wrap -->
			</div> <!-- div for right column -->
		</div> <!-- /row -->"; 

	}
	
	
	else if($count==3)
	{
		echo"
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-3 pull-right'>
				<div class='grid-wrap col-xs-push-5 col-sm-push-7 col-md-push-8 col-lg-push-8'>
					<div class='grid col-sm-4 col-md-3 col-lg-3'> 
					<figure><a href='profile.php?firstname=$name[0]'><img src='$image[0]' alt='img04'/><p>$name[0]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[1]'><img src='$image[1]' alt='img04'/><p>$name[1]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[2]'><img src='$image[2]' alt='img04'/><p>$name[2]</p></figure></a> 
					</div>
				</div><!-- /grid-wrap -->
			</div> <!-- div for right column -->
		</div> <!-- /row -->"; 

	}
	
	
	else if($count==4)
	{
	echo"
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-3 pull-right'>
				<div class='grid-wrap col-xs-push-5 col-sm-push-7 col-md-push-8 col-lg-push-8'>
					<div class='grid col-sm-4 col-md-3 col-lg-3'> 
					<figure><a href='profile.php?firstname=$name[0]'><img src='$image[0]' alt='img04'/><p>$name[0]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[1]'><img src='$image[1]' alt='img04'/><p>$name[1]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[2]'><img src='$image[2]' alt='img04'/><p>$name[2]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[3]'><img src='$image[3]' alt='img04'/><p>$name[3]</p></figure></a>   
					</div>
				</div><!-- /grid-wrap -->
			</div> <!-- div for right column -->
		</div> <!-- /row -->"; 

	}
	
	//for($j=0;$j<=$count;$j++)
	else if($count==5){
	echo"
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-3 pull-right'>
				<div class='grid-wrap col-xs-push-5 col-sm-push-7 col-md-push-8 col-lg-push-8'>
					<div class='grid col-sm-4 col-md-3 col-lg-3'> 
					<figure><a href='profile.php?firstname=$name[0]'><img src='$image[0]' alt='img04'/><p>$name[0]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[1]'><img src='$image[1]' alt='img04'/><p>$name[1]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[2]'><img src='$image[2]' alt='img04'/><p>$name[2]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[3]'><img src='$image[3]' alt='img04'/><p>$name[3]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[4]'><img src='$image[4]' alt='img04'/><p>$name[4]</p></figure></a>  
					<a href='friendlist.php'><h3><b>SHOW ALL</b></h3></a>
					</div>
				</div><!-- /grid-wrap -->
			</div> <!-- div for right column -->
		</div> <!-- /row -->"; }
		
	else
	{
	echo"
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-3 pull-right'>
				<div class='grid-wrap col-xs-push-5 col-sm-push-7 col-md-push-8 col-lg-push-8'>
					<div class='grid col-sm-4 col-md-3 col-lg-3'> 
					<figure><a href='profile.php?firstname=$name[0]'><img src='$image[0]' alt='img04'/><p>$name[0]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[1]'><img src='$image[1]' alt='img04'/><p>$name[1]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[2]'><img src='$image[2]' alt='img04'/><p>$name[2]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[3]'><img src='$image[3]' alt='img04'/><p>$name[3]</p></figure></a> 
					<figure><a href='profile.php?firstname=$name[4]'><img src='$image[4]' alt='img04'/><p>$name[4]</p></figure></a>  
					<a href='friendlist.php'><h3><b>SHOW ALL</b></h3></a>
					</div>
				</div><!-- /grid-wrap -->
			</div> <!-- div for right column -->
		</div> <!-- /row -->"; 
	}
	
//var_dump($name);

?>



































































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
			<div class="main">
				<!-- <header class="codrops-header">
					<h1>Elastic SVG Elements <span>Adding elasticity with SVG shape animations</span></h1>
					<div class="codrops-links">
						<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/DialogEffects/" title="Previous Demo"><span>Previous Demo</span></a> / 
						<a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=21555" title="Back to the article"><span>Back to the Codrops Article</span></a>
					</div>
					<nav class="codrops-demos">
						<a class="current-demo" href="index.html">Sidebar Menu</a>
						<a href="pullupmenu.html">Pull-Up Menu</a>
						<a href="dropdown.html">Drop-down Menu</a>
						<a href="drag.html">Drag &amp; Drop</a>
						<a href="collapseexpand.html">Collapse &amp; Expand</a>
						<a href="hamburger.html">Menu Icon</a>
						<a href="circlemenu.html">Circular Menu</a>
						<a href="inputs.html">Inputs</a>
						<a href="button.html">Buttons</a>
					</nav>
				</header>-->
				<!-- Related demos -->
				<!-- <section class="related">
					<p>If you enjoyed this demo you might also like:</p>
					<a href="http://tympanus.net/Development/WobblySlideshowEffect/">
						<img src="img/related/WobblySlideshowEffect.png" />
						<h3>Wobbly Slideshow Effect</h3>
					</a>
					<a href="http://tympanus.net/Tutorials/ShapeHoverEffectSVG/">
						<img src="img/related/ShapeHoverEffect.png" />
						<h3>Shape Hover Effect</h3>
					</a>
				</section>  -->
			</div><!-- /main -->
		</div><!-- /container -->


		<div class="container1">
			<header class="clearfix">
				<br>
					<h1>NOTIFICATIONS</h1>
			</header>	
			<div class="main1">
					<div class="cbp-mc-column1">
							
	  				</div>
	  				<div class="cbc-mc-column1">
	

	<?php
			//database connection
			mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
			mysql_select_db("webrtc");
			$name=$_COOKIE['userdata']['email'];
			//$name='emma@gmail.com';
			$query = mysql_query("SELECT * FROM notifications WHERE username='$name' AND viewstatus<>'seen'");


		$count=mysql_num_rows($query);
		if ($count==0)
		{
			echo"<h2> <font color='dark blue'>You have no new notifications!</font></h2>";
		}
		
		else {
		
		
		echo"<table align='center' border='1' cellpadding='20' width='100%'>
		<tr>
		<th>SENDER</th>
		<th>FRIEND REQUEST</th>
		</tr>";
		
		
//fetch the results / convert results into an array
		WHILE($rows = mysql_fetch_array($query)):
	
			$sender_name = $rows['friendrequest'];
			$sender_id = $rows['friendrequestemailid'];
		
		echo"<tr>";
		echo"<td>".$sender_name."</td>";
		echo"<td>&nbsp;&nbsp;&nbsp;
		
		<button id='button1' onClick=\"location.href='acceptrequest.php?sendername=$sender_name&senderid=$sender_id'\">Accept</button>
		&nbsp;&nbsp;&nbsp;
		<button id='button1' onClick=\"location.href='rejectrequest.php?sendername=$sender_name&senderid=$sender_id'\">Decline</button>
		</td>";
		echo"</tr>";
		//echo"<br><br>";
		endwhile;
		
		echo"</table>";

		}	
		?>
	</div>
	  	<div class="cbp-mc-column1">
	  				
	  	</div>
			</div>
		</div>
	</body>
	<script src="js/classie.js"></script>
		<script>
			(function() {

				function SVGMenu( el, options ) {
					this.el = el;
					this.init();
				}

				SVGMenu.prototype.init = function() {
					this.trigger = this.el.querySelector( 'button.menu__handle' );
					this.shapeEl = this.el.querySelector( 'div.morph-shape' );

					var s = Snap( this.shapeEl.querySelector( 'svg' ) );
					this.pathEl = s.select( 'path' );
					this.paths = {
						reset : this.pathEl.attr( 'd' ),
						open : this.shapeEl.getAttribute( 'data-morph-open' ),
						close : this.shapeEl.getAttribute( 'data-morph-close' )
					};

					this.isOpen = false;

					this.initEvents();
				};

				SVGMenu.prototype.initEvents = function() {
					this.trigger.addEventListener( 'click', this.toggle.bind(this) );
				};

				SVGMenu.prototype.toggle = function() {
					var self = this;

					if( this.isOpen ) {
						classie.remove( self.el, 'menu--anim' );
						setTimeout( function() { classie.remove( self.el, 'menu--open' );	}, 250 );
					}
					else {
						classie.add( self.el, 'menu--anim' );
						setTimeout( function() { classie.add( self.el, 'menu--open' );	}, 250 );
					}
					this.pathEl.stop().animate( { 'path' : this.isOpen ? this.paths.close : this.paths.open }, 350, mina.easeout, function() {
						self.pathEl.stop().animate( { 'path' : self.paths.reset }, 800, mina.elastic );
					} );
					
					this.isOpen = !this.isOpen;
				};

				new SVGMenu( document.getElementById( 'menu' ) );

			})();
		</script>

</html>
		