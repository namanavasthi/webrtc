<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>SIGN UP</title>
		<meta name="description" content="Blueprint: Blueprint: Responsive Multi-Column Form" />
		<meta name="keywords" content="responsive form, inputs, html5, responsive, multi-column, fluid, media query, template" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
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
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
					<h1>SIGN UP</h1>
			</header>	
			<div class="main">
				<form class="cbp-mc-form" name='myform' action='presignupcheck.php' method='post' onSubmit="return verifyEmail()" enctype='multipart/form-data'>
					<div class="cbp-mc-column1">
						
	  				</div>
					
					<div class="cbp-mc-column">
	  				
					<label for="first_name">First Name</label>
	  					<input type="text" name="fname">
						<label for="last_name">Last Name</label>
	  					<input type="text" name="lname">
						<label for="gender">Gender</label>
						<input type="text" name="gender" >
						<label for="country">Country</label>
	  					<input type="text" name="country" >	
						<label for="username">Username</label>
	  					<input type="text" name="username"> 
						<label for="emailid">Email Address</label>
	  					<input type="text" name="emailid"> 
						<label for="file">Profile Picture</label>
						<input type="file" name="image">
						<form method="post" action="verify.php">
						   <?php
						     require_once('recaptchalib.php');
						     $publickey = "6Lf4QQITAAAAAHdSD33qmqIApjT6hY0TSaPZzlvo"; // you got this from the signup page
						     echo recaptcha_get_html($publickey);
						   ?>
						   <input type="submit" />
						   
						</form>

						<br>
						<div class="g-recaptcha" data-sitekey="6Lf4QQITAAAAAHdSD33qmqIApjT6hY0TSaPZzlvo"></div>
					
	  				</div>
	  				<div class="g-recaptcha" data-sitekey="6Lf4QQITAAAAAHdSD33qmqIApjT6hY0TSaPZzlvo"></div>

					
	  				<div class="cbp-mc-column1">
						
	  				</div>
	  				
	  				<div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" type="submit" value="SUBMIT" /></div>
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