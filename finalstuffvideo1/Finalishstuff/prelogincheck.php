<html>
  <head>
	<title></title>
  <head>
  <body>
  
  <style>
  h3 {
    color:red;
}
  </style>
  
	<?php 
	//session_start();
	//connect to the server
$connect = mysql_connect("localhost","root","");

//connect to the datatbase
mysql_select_db("webrtc");

if(isset($_POST['emailid'])&&isset($_POST['password']))
{
	$emailid = $_POST['emailid'];
	$fname = $_POST['fullname'];
	$password = $_POST['password'];
	//$password_hash=md5($password);
	//echo "inside if";
 
	//echo $password_hash;
	
	if(!empty($emailid)&&!empty($password)&&!empty($fname))
	{
		$query = mysql_query("SELECT * FROM users WHERE emailid='$emailid' AND password ='$password'");
		$data = mysql_fetch_array($query);

		//echo "inside first nested if";
		
		//$query_run=$query;
		$query_num_rows = mysql_num_rows($query);
		//echo $query_num_rows;
			if($query_num_rows==0)
			{
				//echo "inside second nested if";
				echo"<br><br>";
				echo "<h3>Invalid emailid/password combination</h3>";
				include('loginnonfb.html');
			}
			else if($query_num_rows==1)
			{
				//$queryins = mysql_query("UPDATE `users` SET `Active`=1 where `UserName`='$username' and `UserPassword`='$password'");
				//echo "inside first else if";
				//creating a cookie for this user
				$expire=time()+60*60*24;
				setcookie('userdata[name]',$fname,$expire,'','','',TRUE);
				setcookie('userdata[email]',$emailid,$expire,'','','',TRUE);
		
				 $check=1;
					if($check==1)
					{
						if(isset($_COOKIE['userdata'])){
						foreach($_COOKIE['userdata'] as $name=>$value){
						$name=htmlspecialchars($name);
						$value=htmlspecialchars($value);
                  //  echo "$name : $value <br />\n";

						}
						}
						header('Location:homepagenonfb.php');
					}
		
			

			}

		
	}
	else
	{
		echo"<br><br>";
		echo "<h3>Please fill in all the fields</h3>";
		include('loginnonfb.html');
	}
  
}
?>
  
 </body>
</html>