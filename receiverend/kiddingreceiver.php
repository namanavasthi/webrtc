<?php
session_start();

//connect to db
//mysql_connect("localhost","root","");
mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
mysql_select_db("webrtc");
//include('../../ajaxfiles/load.php');
?>


<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HOME PAGE</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/sidebar.css" />
		<link rel="stylesheet" type="text/css" href="css/component2_maincontent.css" />

		<link rel="stylesheet" type="text/css" href="css/demo_rightbar.css" />
		<link rel="stylesheet" type="text/css" href="css/component_rightbar.css" />
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












		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		
		
		
		<script type="text/javascript">
		
var loadedobjects=""
var rootdomain="http://"+window.location.hostname

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
page_request.open('GET', url, true)
page_request.send(null)




}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}

</script>
		
		

		
		
		
		
		
		
		
		
		
	</head>

	
















	<body>
	
	<div id="leftcolumn">
	
<a href="javascript:ajaxpage('load.php', 'rightcolumn');">Porsche Page</a>



<!--<a href="javascript:loadobjs('../../ajaxfiles/style.css', 'ajaxfiles/tooltip.js');">Load "style.css" and "tooltip.js"</a>-->

</div>
	
	<div id="rightcolumn"><h3>yooooo<h3></div>
	
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
	
	
	
	<script src="general.js"></script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<div class="container-fluid" style="height:720px">


<!-- navbar header -->
<!--
	<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse navbar-static-top">
      
        <div class="navbar-header">
	    <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </a>
        <a class="navbar-brand" href="#">Web RTC</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="http://www.bootply.com" target="ext">About</a></li>
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
        </div>

    </div>
  </div><!-- /container -->
  
<!--</div>
<!-- /navbar wrapper -->

<!-- end of navbar -->





















<!-- right bar-->

<?php

	$query = mysql_query("SELECT * FROM users");
	$name=array();
	$i=0;
	$count=mysql_num_rows($query);
	WHILE($rows = mysql_fetch_array($query)):
	
		$fullname = $rows['fullname'];
			//include('kiddingnext.php');
		$name[$i]=$fullname;
		$i++;
		
	endwhile;

	//for($j=0;$j<=$count;$j++)
	
		echo"
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-3 pull-right'>
				<div class='grid-wrap col-xs-push-5 col-sm-push-7 col-md-push-8 col-lg-push-8'>
					<div class='grid col-sm-4 col-md-3 col-lg-3'> 
					<figure><a href='printlala.php?firstname=$fullname'><img src='img/4.jpg' alt='img04'/><p>$name[0]</p></figure></a> 
					<figure><a href='printlala.php?firstname=$fullname'><img src='img/4.jpg' alt='img04'/><p>$name[1]</p></figure></a> 
					<figure><a href='printlala.php?firstname=$fullname'><img src='img/4.jpg' alt='img04'/><p>$name[2]</p></figure></a> 
					<figure><a href='printlala.php?firstname=$fullname'><img src='img/4.jpg' alt='img04'/><p>$name[3]</p></figure></a> 
					<figure><a href='printlala.php?firstname=$fullname'><img src='img/4.jpg' alt='img04'/><p>$name[4]</p></figure></a>  
					</div>
				</div><!-- /grid-wrap -->
			</div> <!-- div for right column -->
		</div> <!-- /row -->"; 
	
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
			<!--<nav id="menu" class="menu">
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
			</nav> -->
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

<!-- 
<?php
// include("usercookie.php");
?> 






-->




<!-- main content of the page goes here -->

		<div class="container">
			<div class="side-fluid">
				<div class="intro-content">				
					<div class="profile"><img src="img/profile1.jpg" alt="profile1"></div>
					<!-- <a href="http://www.google.com"><h1><span>Toby Blue </span><span>Web Designer</span></h1></a> -->
					<a href="http://www.google.com"><h1><span><?php print_r($_COOKIE['userdata']['name']); ?></span><span><?php print_r($_COOKIE['userdata']['email']); ?></span></h1></a>
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