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
		<link rel="webrtc icon" href="images/webrtc_ico.ico"/>
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



<style>




label {
	display: inline;
}

.regular-checkbox {
	display: none;
}

.regular-checkbox + label {
	background-color: #fafafa;
	border: 1px solid #cacece;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
	padding: 9px;
	border-radius: 3px;
	display: inline-block;
	position: relative;
}

.regular-checkbox + label:active, .regular-checkbox:checked + label:active {
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
}

.regular-checkbox:checked + label {
	background-color: #e9ecee;
	border: 1px solid #adb8c0;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
	color: #99a1a7;
}

.regular-checkbox:checked + label:after {
	content: '\2714';
	font-size: 14px;
	position: absolute;
	top: 0px;
	left: 3px;
	color: #99a1a7;
}


.big-checkbox + label {
	padding: 18px;
}

.big-checkbox:checked + label:after {
	font-size: 28px;
	left: 6px;
}

.tag {
	font-family: Arial, sans-serif;
	width: 200px;
	position: relative;
	top: 5px;
	font-weight: bold;
	/*text-transform: uppercase;*/
	display: block;
	/*float: left;*/
}

.radio-1 {
	width: 193px;
}

.button-holder {
	float: left;
}

/* RADIO */

.regular-radio {
	display: none;
}

.regular-radio + label {
	-webkit-appearance: none;
	background-color: #fafafa;
	border: 1px solid #cacece;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
	padding: 9px;
	border-radius: 50px;
	display: inline-block;
	position: relative;
}

.regular-radio:checked + label:after {
	content: ' ';
	width: 12px;
	height: 12px;
	border-radius: 50px;
	position: absolute;
	top: 3px;
	background: #99a1a7;
	box-shadow: inset 0px 0px 10px rgba(0,0,0,0.3);
	text-shadow: 0px;
	left: 3px;
	font-size: 32px;
}

.regular-radio:checked + label {
	background-color: #e9ecee;
	color: #99a1a7;
	border: 1px solid #adb8c0;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1), inset 0px 0px 10px rgba(0,0,0,0.1);
}

.regular-radio + label:active, .regular-radio:checked + label:active {
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
}

.big-radio + label {
	padding: 16px;
}

.big-radio:checked + label:after {
	width: 24px;
	height: 24px;
	left: 4px;
	top: 4px;
}

</style>













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
        <a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php"><img src="images/webrtc.png">Vid3Com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/aboutus/aboutus.html" target="ext">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li>
				<!-- <div class="container"> -->
				<a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/notifications.php">
					<!-- <button class="btn btn-default btn-lg btn-link" style="font-size:36px;"> -->
						<span class="glyphicon glyphicon-comment"></span>
						Notification
					<!-- </button> -->
					<!-- <span class="badge badge-notify"> -->
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
		<div class='options'>
		<form action='vidmulti.php' method='post'>
		<div>
				<div class='tag'>$name[0]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[0]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
		<!-- <input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br> -->
		<input type='submit' value='Submit'>
		</form>
		</div>
		";
	}
	
	else if($count==2)
	{
		echo"
		ADD FRIENDS TO THE MULTICHAT: <br>

		<form action='vidmulti.php' method='post'>
			<div>
				<div class='tag'>$name[0]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[0]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
			<div>
				<div class='tag'>$name[1]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[1]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
		<!-- 
			<input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br>
			<input type='checkbox' name='check_list[$name[1]]'>$name[1]</input> <br> 
		-->
		<input type='submit' value='Submit'>
		</form>
		";
	}
	
	else if($count==3)
	{
		echo"
		ADD FRIENDS TO THE MULTICHAT: <br>
		<div class='options'>
		<form action='vidmulti.php' method='post'>

			<div>
				<div class='tag'>$name[0]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[0]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
			<div>
				<div class='tag'>$name[1]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[1]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
			<div>
				<div class='tag'>$name[2]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[2]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>

		<!-- 
		<input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br>
		<input type='checkbox' name='check_list[$name[1]]'>$name[1]</input> <br>
		<input type='checkbox' name='check_list[$name[2]]'>$name[2]</input> <br>
		-->


		<input type='submit' value='Submit'>
		</form>
		</div>
		";
	}
	
	else if($count==4)
	{
		echo"
		ADD FRIENDS TO THE MULTICHAT: <br>
		<div class='options'>
		<form action='vidmulti.php' method='post'>

			<div>
				<div class='tag'>$name[0]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[0]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
			<div>
				<div class='tag'>$name[1]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[1]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
			<div>
				<div class='tag'>$name[2]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[2]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>
			<div>
				<div class='tag'>$name[3]</div>
				<input type='checkbox' id='checkbox-2-1' class='regular-checkbox big-checkbox' name='check_list[$name[3]]'>
					<label for='checkbox-2-1'></label>
				</input>
			</div>



		<!-- 
		<input type='checkbox' name='check_list[$name[0]]'>$name[0]</input> <br>
		<input type='checkbox' name='check_list[$name[1]]'>$name[1]</input> <br>
		<input type='checkbox' name='check_list[$name[2]]'>$name[2]</input> <br>
		<input type='checkbox' name='check_list[$name[3]]'>$name[3]</input> <br>
		-->


		<input type='submit' value='Submit'>
		</form>
		</div>
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