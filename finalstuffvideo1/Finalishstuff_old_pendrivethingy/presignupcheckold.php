<html>

<?php
//connect to db
mysql_connect("localhost","root","");
mysql_select_db("webrtc");

$em=$_POST["emailid"];
$uname=$_POST["username"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$country=$_POST["country"];
$gender=$_POST["gender"];
$a= hash ( "md5" , $em);
$fullname=$fname." ".$lname;

	if(empty($fname)===true||empty($lname)===true || empty($uname)===true || empty($em)===true || empty($country)===true || empty($gender)===true || empty($_FILES) || !isset($_FILES['image']))
	{
		echo"<font size=5 color=red face=Arial>Please fill in all the fields</font>";	
		include ('signupnonfb.php');
	}	
	
	else if(!empty($_FILES) && isset($_FILES['image']))
	{
		$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name=addslashes($_FILES['image']['name']);
		$image_size=is_array(getimagesize($_FILES['image']['tmp_name'])); // output:1 =>use along with $image_size=is_array(getimagesize($_FILES['image']['tmp_name']));


		/*$query = "INSERT INTO users(firstname,lastname,fullname,gender,country,username,emailid,hashemail) VALUES('$fname','$lname','$fullname','$gender','$country','$uname','$em','$a')";
		$result = mysql_query($query);
*/
		
		if($image_size==FALSE)
			echo "Please upload an image file";
		else if(!$insert=mysql_query("INSERT INTO users VALUES('$fname','$lname','$fullname','$em','$a','$uname','$country','$gender','$image_name','$image')"))
				echo "Image didn't get uploaded";
	}
	  //creating a cookie for this user
        $expire=time()+60*60*24;
        setcookie('userdata[name]',$fname,$expire,'','','',TRUE);
        setcookie('userdata[email]',$em,$expire,'','','',TRUE);
		
		//echo"<img src='$image'>";
		
		
		
		//ADDDDEEDDDDD
		
		// Content type


		// Get new sizes
		//list($width, $height) = getimagesize($image);
		//$newwidth = 150;
		//$newheight = 150;

		// Load

		//$source = imagecreatefromjpeg($image);
		//$source = $image;
		//$image = imagecreatetruecolor($newwidth, $newheight);

		// Resize
		//imagecopyresized($image, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		// Output
		//$image1=imagejpeg($thumb); 

		//echo"<img src='$image'>";

header('Content-Type: image/jpeg');

		//$queryins=mysql_query("UPDATE users SET image='$image' WHERE hashemail='$a'");
	
        $check=1;
        if($check==1)
        {
            if(isset($_COOKIE['userdata'])){
                foreach($_COOKIE['userdata'] as $name=>$value){
                    $name=htmlspecialchars($name);
                    $value=htmlspecialchars($value);
                    echo "$name : $value <br />\n";
                    
                }
            }   
            echo "<a href=kiddingnonfb.php>Go to main page</a>";
            echo "<a href=http://webrtc-fypgroup11.rhcloud.com/usercookie.php>Go to cookie test</a>";

        }
		
	// include('../../ElasticSVGElements/kidding.php');
	
	
?>
</html>