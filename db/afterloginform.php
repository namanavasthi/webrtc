<html>
<title>humamama</title>

<?php

$em=$_POST["emailid"];
$uname=$_POST["username"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$a= hash ( "md5" , $em);

// naman code trial and error for cokies

$expiry = time()+60*60*24;
setcookie('userdata[name]',$fname,$expiry,'','','',TRUE);
setcookie('userdata[email]',$em,$expiry,'','','',TRUE);

print"LAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA!!";

///



//connect to the server
$connect = mysql_connect("http://webrtc-fypgroup11.rhcloud.com","adminPfy2zVu","BXXbBfmR7fWS");

//connect to the datatbase
mysql_select_db("webrtc");

	$query = "INSERT INTO users (firstname,lastname,emailid,hashemail,username) VALUES('$fname','$lname','$em','$a','$uname')";
	
	
	$result = mysql_query($query);


//query the database
$query = mysql_query("SELECT * FROM users");

echo"<body>
<h1 align=center><u> USERS </u></h1>
</body>";

		echo"<table align='center' border='1'>
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email ID</th>
		</tr>";

//fetch the results / convert results into an array
		WHILE($rows = mysql_fetch_array($query)):
	
			$first_name = $rows['firstname'];
			$last_name = $rows['lastname'];
			$email = $rows['emailid'];
			
		
		echo"<tr>";
		echo"<td>".$first_name."</td>";
		echo"<td>".$last_name."</td>";
		echo"<td>".$email."</td>";
		echo"</tr>";
		//echo"<br><br>";
		endwhile;
		
		echo"</table>";


?>

<body>
<p> name : <?php echo $_COOKIE['userdata[[name]]']; ?> </p>
<?php
if(isset($_COOKIE['userdata'])){
	foreach($_COOKIE['userdata'] as $name=>$value){
		$name=htmlspecialchars($name);
		$value=htmlspecialchars($value);
		echo "$name : $value <br />\n";
	}
}
?>
<p> <?php print_r($_COOKIE); ?></p>

<a href="http://localhost/myfiles/main.php">blahblah</a>


</body>

</html>