<html>

<?php

require_once('recaptchalib.php');
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
 	// echo "yomama";
 }




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
	
	else if(!empty($_FILES) && isset($_FILES['image']))
	{
		$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name=addslashes($_FILES['image']['name']);
		$image_size=is_array(getimagesize($_FILES['image']['tmp_name'])); // output:1 =>use along with $image_size=is_array(getimagesize($_FILES['image']['tmp_name']));


/*		$query = "INSERT INTO users(firstname,lastname,fullname,gender,country,username,emailid,hashemail) VALUES('$fname','$lname','$fullname','$gender','$country','$uname','$em','$a')";
		$result = mysql_query($query);*/

		
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
	//}
?>
</html>