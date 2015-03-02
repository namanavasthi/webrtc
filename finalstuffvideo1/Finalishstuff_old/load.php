<!--<p> muhahahaha </p><br><br>-->

<html>
<body>


</body>
</html>
<?php

$flag=0;
$name="Rhea Thomas";
//$name=$_COOKIE['userdata']['name'];    //CHECK IF THIS IS CORRECT!!!!!!!!!!!!!!! should it be emailid??
//echo "muahaha";
//echo $name;
//$connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
$connect=mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");

if (!$connect) {
	die("Connection failed: " .mysql_error());
} 
//echo 'Connected successfully';

//connect to the datatbase
mysql_select_db("webrtc");

$query = mysql_query("SELECT webrtcid FROM friends WHERE friendname='$name' and webrtcid<>''");
$count=mysql_num_rows($query);
//echo $count;
if($count!=0) {
WHILE ($rows=mysql_fetch_array($query)):
		$webrtcid=$rows['webrtcid'];
		//echo $webrtcid;
endwhile;
//echo $webrtcid;
//$webrtcid=urldecode($webrtcid);
//setcookie("webrtcid",$webrtcid);
}

$query = mysql_query("SELECT webrtcid FROM friends WHERE friendname='$name' and webrtcid<>''");
//$result=mysql_fetch_assoc($query);
if(mysql_fetch_array($query) != 0) {
	//echo "query executed succesfully";
	//echo "Lalala";


	
	//THIS PART SEEMS TO BE FINE!!
	
	echo "<script>
	var r=confirm('Click here to accept the video call');
	if(r==true) {
	window.location.href='//webrtc-fypgroup11.rhcloud.com/videocall.php#$webrtcid';
	
	}
	
	else
	{
		window.location.href='homepagereceivertrial.php';
	}
	</script>"; 

	
	
	//$value=1001;
	//echo $webrtcid;
	//setcookie("flag", "1001",time()+3);
	//setcookie("flag", "1001");
	//echo $_COOKIE['flag'];
	//print $_COOKIE['flag'];
	
	
}
else{
//setcookie("flag", "100",time()-3);
//setcookie("flag", "100");
//echo "this sucks";
}
?>