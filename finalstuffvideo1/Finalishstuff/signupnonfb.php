<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>SIGN UP</title>
		<link rel="stylesheet" type="text/css" href="css/signupnonfbdefault.css" />
		<link rel="stylesheet" type="text/css" href="css/signupnonfbcomponent.css" />
		<script src="js/modernizr.custom.js"></script>
		<script>
		function verifyEmail(){
		var status = false;     
		var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		if (document.myform.emailid.value.search(emailRegEx) == -1) {
          alert("Please enter a valid email address.");
		  return status;
		}
     
							}
		</script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<script src="js/snap.svg-min.js"></script>


		<!-- bootstrap scripts -->
			<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

		<!-- end of bootstrap scripts -->

		
	
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
        <a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php">Web RTC</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
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
</div><!-- /navbar wrapper -->

<!-- end of navbar -->











		
		<div class="container">
			<header class="clearfix">
					<br><h1>SIGN UP</h1>
			</header>	
			<div class="main">
				<form class="cbp-mc-form" name='myform' action='presignupcheck.php' method='post' onSubmit="return verifyEmail()" enctype='multipart/form-data'>
					<div class="cbp-mc-column1">
						
	  				</div>
					
					<div class="cbp-mc-column">
	  				
					<label for="first_name">First Name</label>
	  					<input type="text" name="fname" required>
						<label for="last_name">Last Name</label>
	  					<input type="text" name="lname" required>
						<label for="gender">Gender</label>
						<input type="text" name="gender" required>
						<label for="country">Country</label>
	  					<input type="text" name="country" required>	
						<label for="username">Username</label>
	  					<input type="text" name="username" required> 
						<label for="username">Password</label>
	  					<input type="password" name="password" required> 
						<label for="emailid">Email Address</label>
	  					<input type="text" name="emailid" required> 
						<label for="file">Profile Picture</label>
						<input type="file" name="image" required>
						<div class="g-recaptcha" data-sitekey="6Lf4QQITAAAAAHdSD33qmqIApjT6hY0TSaPZzlvo"></div>  
						<br>
						<input type="submit" name="submit" value="Submit"><br><br>
						

					
	  				</div>
					
	  				<div class="cbp-mc-column1">
						
	  				</div>
	  				
	  				<!-- <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" type="submit" value="SUBMIT" /></div> -->
				</form>
			</div>
		</div>
	
<?php
//connect to db
//mysql_connect("localhost","root","");
//mysql_select_db("webrtc");

//file properties
/*$file=$_FILES['image']['tmp_name'];

if(!isset($file))
	echo"Please select an image";
	
if(empty($_FILES) || !isset($_FILES['image']))
	echo"Please select an image";
	
else
{
	$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name=addslashes($_FILES['image']['name']);
	$image_size=is_array(getimagesize($_FILES['image']['tmp_name'])); // output:1 =>use along with $image_size=is_array(getimagesize($_FILES['image']['tmp_name']));


if($image_size==FALSE)
	echo "Please upload an image file";
else
{
	if(!$insert=mysql_query("INSERT INTO test VALUES ('','$image_name','$image')"))
		echo "Image didn't get uploaded";
		
/*	else
	{
		$last_id=mysql_insert_id();
		echo "Image Uploaded <p/> Your Image <p/> <img src=displayim.php?id=$last_id height='200' width='200'> ";
	}*/
//}
//}*/

?>
</body>
</html>