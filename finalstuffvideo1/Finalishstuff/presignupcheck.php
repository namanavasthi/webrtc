<html>
<head>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Sign Up Check</title>
		
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/homepagenormalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagedemo.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagesidebar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent2_maincontent.css" />

		


		<link rel="stylesheet" type="text/css" href="css/signupnonfbdefault.css" />
		<link rel="stylesheet" type="text/css" href="css/signupnonfbcomponent.css" />
		<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
		
<!-- bootstrap scripts -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- end of bootstrap scripts -->

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


</div>  <!-- end of container div -->



<?php
//connect to db
mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
mysql_select_db("webrtc");

$em=$_POST["emailid"];
$uname=$_POST["username"];
$password=$_POST["password"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$country=$_POST["country"];
$gender=$_POST["gender"];
$a= hash ( "md5" , $em);
$fullname=$fname." ".$lname;

	if(empty($fname)===true||empty($lname)===true || empty($uname)===true || empty($em)===true ||empty($password)===true || empty($country)===true || empty($gender)===true || empty($_FILES) || !isset($_FILES['image']))
	{
		echo"<font size=5 color=red face=Arial>Please fill in all the fields</font>";	
		include ('signupnonfb.php');
	}	
	if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<br><br><br><br><h2>Please check the the captcha form.</h2>';
          header('Refresh: 1;url=http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/signupnonfb.php');
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf4QQITAAAAAACcjNB3DDMQudNEYmKsm_FcqSlG&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo '<h2>Bot has been detected</h2>';
        }else
        {
          
	
	if(!empty($_FILES) && isset($_FILES['image']))
	{
		$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name=addslashes($_FILES['image']['name']);
		$image_size=is_array(getimagesize($_FILES['image']['tmp_name'])); // output:1 =>use along with $image_size=is_array(getimagesize($_FILES['image']['tmp_name']));


/*		$query = "INSERT INTO users(firstname,lastname,fullname,gender,country,username,emailid,hashemail) VALUES('$fname','$lname','$fullname','$gender','$country','$uname','$em','$a')";
		$result = mysql_query($query);*/

		
		/* require_once('recaptchalib.php');
		$privatekey = "6Lf4QQITAAAAAACcjNB3DDMQudNEYmKsm_FcqSlG";
		$resp = recaptcha_check_answer ($privatekey,
                                 $_SERVER["REMOTE_ADDR"],
                                 $_POST["recaptcha_challenge_field"],
                                 $_POST["recaptcha_response_field"]);
		if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
		die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
        "(reCAPTCHA said: " . $resp->error . ")");
		} else {
		// Your code here to handle a successful verification
 	//echo "yomama";
		} */
		
		
		if($image_size==FALSE)
			echo "Please upload an image file";
		else if(!$insert=mysql_query("INSERT INTO users VALUES('$fname','$lname','$fullname','$em','$a','$uname','$password','$country','$gender','$image_name','$image','','','')"))
				echo "Image didn't get uploaded";
	
	//else {
	  
	  header('Location:loginnonfb.html');
		
//header('Content-Type: image/jpeg');

	
     /*   $check=1;
        if($check==1)
        {
            if(isset($_COOKIE['userdata'])){
                foreach($_COOKIE['userdata'] as $name=>$value){
                    $name=htmlspecialchars($name);
                    $value=htmlspecialchars($value);
                  //  echo "$name : $value <br />\n";
                    
                }
            }   
           // echo "<a href=.php>Go to main page</a>";
           //echo "<a href=http://webrtc-fypgroup11.rhcloud.com/usercookie.php>Go to cookie test</a>";
			include ('loginnonfb.html');
        }
		*/
	// include('../../ElasticSVGElements/kidding.php');
		}
	} //end of else part of captcha
	//}
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>