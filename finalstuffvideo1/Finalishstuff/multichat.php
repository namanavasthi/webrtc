<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MULTICHAT</title>
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



        <!-- scripts used for video-conferencing -->
        <script src="firebase.js"> </script>
        <script src="RTCPeerConnection-v1.5.js"> </script>
        <script src="conference.js"> </script>
        
        <!-- script used to stylize video element -->
        <script src="getMediaElement.min.js"> </script>








		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	
















	<body>

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
        <a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php">Web RTC</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/aboutus.php">About</a></li>
            <li><a href="#contact">Contact</a></li>
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
				</div><!-- /main -->
		</div><!-- /container -->


<div class="container">
			<div class="side-fluid">
				<div class="intro-content">	
<?php

mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
mysql_select_db("webrtc");

$a=$_COOKIE['userdata']['email'];
	//$a='4e6855fa50d8467f0c67bcb33b70285b';
	//echo $name;
$a=hash("md5",$a);

$query=mysql_query("SELECT * FROM friends WHERE userid='$a' AND friendname in (SELECT fullname FROM users WHERE status='Online')");

$name=array();
	$i=0;
	$count=mysql_num_rows($query);
	WHILE($rows = mysql_fetch_array($query)):
	
		$fullname = $rows['friendname'];
			//include('kiddingnext.php');
		$name[$i]=$fullname;
		$i++;
		
	endwhile;
	
	//var_dump($name);
	
	if ($count==0)
	{
		echo"No one seems to be online right now, try again later";
	}
	
		else if($count==1)
	{
		echo"
		ADD FRIENDS TO THE MULTICHAT: <br>
		<form action='vidmulti.php' method='post'>
		<input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br>
		<input type='submit' value='Submit'>
		</form>
		";
	}
	
	else if($count==2)
	{
		echo"
		ADD FRIENDS TO THE MULTICHAT: <br>
		<form action='vidmulti.php' method='post'>
		<input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br>
		<input type='checkbox' name='check_list[$name[1]]'>$name[1]</input> <br>
		<input type='submit' value='Submit'>
		</form>
		";
	}
	
	else if($count==3)
	{
		echo"
		ADD FRIENDS TO THE MULTICHAT: <br>
		<form action='vidmulti.php' method='post'>
		<input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br>
		<input type='checkbox' name='check_list[$name[1]]'>$name[1]</input> <br>
		<input type='checkbox' name='check_list[$name[2]]'>$name[2]</input> <br>
		<input type='submit' value='Submit'>
		</form>
		";
	}
	
	else if($count==4)
	{
		echo"
		ADD FRIENDS TO THE MULTICHAT: <br>
		<form action='vidmulti.php' method='post'>
		<input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br>
		<input type='checkbox' name='check_list[$name[1]]'>$name[1]</input> <br>
		<input type='checkbox' name='check_list[$name[2]]'>$name[2]</input> <br>
		<input type='checkbox' name='check_list[$name[3]]'>$name[3]</input> <br>
		<input type='submit' value='Submit'>
		</form>
		";
	}

	                      	
	else 
	{
	
		$query=mysql_query("SELECT * FROM friends WHERE userid='$a' AND friendname in (SELECT fullname FROM users WHERE status='Online')");
		echo"ADD FRIENDS TO THE MULTICHAT: (MAXIMUM 4 PARTICIPANTS)";
		echo '<form action="vidmulti.php" action="post">';
		while($row = mysql_fetch_array($query))
		{
			//echo "<input type='checkbox' name='check_list[".$row['friendname']."]'>". $row['friendname']. "</input> <br>";
			$namefriend=$row['friendname'];
			//echo'<input type="checkbox" name='. $row['friendname'] .'>'. $. '</option> <br>';
			echo"<input type='checkbox' name='check_list[$namefriend]'>$namefriend</input> <br>";
		}
		
		echo "		<input type='submit' value='Submit'>
		</form>";

	}
	
?>
				</div>
			</div>
		</div><!-- /container -->
		



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


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

	</body>


</html>