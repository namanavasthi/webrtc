<!--<p> muhahahaha </p><br><br>-->

<html>
<body>
<script src="jquery-1.9.1.min.js"></script>

</body>
</html>
<?php

$flag=0;
//$name="Rhea Thomas";
$name=$_COOKIE['userdata']['name'];    //CHECK IF THIS IS CORRECT!!!!!!!!!!!!!!! should it be emailid??
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

$query = mysql_query("SELECT userid,username,webrtcid,type FROM friends WHERE friendname='$name' and webrtcid<>''");
$count=mysql_num_rows($query);
//echo $count;
$type='NULL';
if($count!=0) {
WHILE ($rows=mysql_fetch_array($query)):
		$webrtcid=$rows['webrtcid'];
		$username=$rows['username'];
		$userid=$rows['userid'];
		$type=$rows['type'];
		//echo $webrtcid;
endwhile;
//echo $webrtcid;
//$webrtcid=urldecode($webrtcid);
setcookie("userid",$userid);
}

$query = mysql_query("SELECT username,webrtcid,type FROM friends WHERE friendname='$name' and webrtcid<>''");
$val='rejected';

	if($type=='video') {
		if(mysql_fetch_array($query) != 0) {
			echo "<script>
			var r=confirm('Click here to accept the video call from $username');
			if(r==true) {
			window.location.href='vidindex.php#$webrtcid';
			}
	
		else
		{
			window.location.href='homepage.php?callstatus=$val&caller=$username';

		}
		</script>"; 
		}
	}
	else if($type=='audio') {
		if(mysql_fetch_array($query) != 0) {
		echo "<script>
		var r=confirm('Click here to accept the audio call from $username');
		if(r==true) {
		window.location.href='voiceindex.php#$webrtcid';
		}
	
		else
		{
			window.location.href='homepage.php?callstatus=$val&caller=$username';
		}
		</script>"; 
		}
	}

	else if($type=='multichat') {
		if(mysql_fetch_array($query) != 0) {
		echo "<script>
		var r=confirm('Click here to join the conference initiated by $username');
		if(r==true) {
		window.location.href='multiindex.php#$webrtcid';
		}
	
		else
		{
			window.location.href='homepage.php?callstatus=$val&caller=$username';
		}
		</script>"; 
		}
	}
	else if($type=='NULL')
	{

	}

	else
	{}

?>