<?php
$lala=addslashes($_REQUEST['firstname']);
$expire=time()+60*60*24;
setcookie('friendname',$lala,$expire,'','','',TRUE);

//session_start();

//connect to db
mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
mysql_select_db("webrtc");

//$image=mysql_query("SELECT * FROM users where firstname='$name'");
//$image=mysql_fetch_assoc($image);
//$friendimage=$image['image'];

?>


<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HOME PAGE</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/homepagenormalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagedemo.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagesidebar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent2_maincontent.css" />

		<link rel="stylesheet" type="text/css" href="css/homepagedemo_rightbar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent_rightbar.css" />
		<link href="css/bootstrap.css" rel="stylesheet">
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















<!-- right bar-->

<?php


	$a=$_COOKIE['userdata']['email'];
	//echo $name;
	$a=hash("md5",$a);
	//echo $name;
	//$query = mysql_query("SELECT * FROM friends WHERE userid='$a'");
	//$query = mysql_query("SELECT * FROM users");
	
	//ADDDDDDDDEEEEEEEEEEEEDDDDDDDDDDD TODAAAAAAAAAAYYYYYYYYYYY
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

<!--<figure><img src='img/3.jpg' alt='img03'/><p>YOYO1</p></figure>
						<figure><img src='img/1.jpg' alt='img01'/><p>YOYO2</p></figure>
						<figure><img src='img/5.jpg' alt='img05'/><p>YOYO3</p></figure>
						<figure><img src='img/2.jpg' alt='img02'/><p>YOYO4</p></figure>
						<figure><img src='img/8.jpg' alt='img08'/></figure>
						<figure><img src='img/9.jpg' alt='img09'/></figure> -->
						<!-- <figure><img src='img/6.jpg' alt='img06'/></figure> -->
						<!-- <figure><img src='img/7.jpg' alt='img07'/></figure> -->

























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

<!-- 

// include("usercookie.php");
					







-->




<!-- main content of the page goes here -->

		<div class="container">
			<div class="side-fluid">
				<div class="intro-content">				
			<!--	
					echo"<div class='profile'> <img src='php/imageoffriend?imagename=$lala'></div>";
					
					?> -->
					<div class='profile'>
					
					
					<?php
							
							$query=mysql_query("SELECT fullname,imagename,imagelarge from users WHERE fullname='$lala'");
							WHILE($rows = mysql_fetch_array($query)):
	
								$fullname = $rows['fullname'];
								$imagename = $rows['imagename'];
								//echo $fullname;
								if($rows['imagename'!=''])
								{
									echo"<img src='disim.php?id=$fullname'>";
								}
								else
								{
									$image=$rows['imagelarge'];
									echo "<img src='$image'>";
								}
							endwhile;
					?>
					
					
					
					</div>
					
					<!-- <a href="http://www.google.com"><h1><span>Toby Blue </span><span>Web Designer</span></h1></a> 
					<a href="http://www.google.com"><h1><span> ADD PHP HERE!!!!!!!!!!!!!!!!!!</span></h1></a> -->
					<h1><span><font color='blue'><?php print $lala; echo"<br>"; 
					//print_r($_COOKIE['userdata']['name']);?>
					</font></span></h1>
					<!-- <h1><span><a href="http://www.google.com">Voice Call</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="voicecall.php">Video Call</a></span></h1>  -->
					
					<!-- ADDDDDEDDDDDDDDDDD PARTTTTTTTTT COOOOOOOOKKKIIIIEEEEEEEEEEE-->
					
					
					<!-- <h1><span><a href="http://www.google.com">Voice Call</a> </span></h1>  
					<!-- ADDED PART!!!!!!!!!!!!!!!!!!!!!!!!!!! king.php-->
					
					</div>
				</div>
			</div>

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