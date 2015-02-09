<!--<p> muhahahaha </p><br><br>-->

<html>
<body>


</body>
</html>
<?php

$flag=0;
$name="Rhea Thomas";
//echo "muahaha";
$connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
//$connect=mysql_connect("localhost","root","");

if (!$connect) {
	die("Connection failed: " .mysql_error());
} 
//echo 'Connected successfully';

//connect to the datatbase
mysql_select_db("webrtc");

$query = mysql_query("SELECT * FROM friends WHERE friendname='$name'");
WHILE ($rows=mysql_fetch_array($query)):
		$webrtcid=$rows['webrtcid'];
		//echo $webrtcid;
endwhile;
$webrtcid=urlencode($webrtcid);
setcookie("webrtcid",$webrtcid);

$query = mysql_query("SELECT * FROM friends WHERE friendname='$name'");
//$result=mysql_fetch_assoc($query);
if(mysql_fetch_array($query) != 0) {
	//echo "query executed succesfully";
	echo "Lalala";	
	//$value=1001;
	//echo $webrtcid;
	//setcookie("flag", "1001",time()+3);
	setcookie("flag", "1001");
	//echo $_COOKIE['flag'];
	//print $_COOKIE['flag'];
	
	
}
else{
//setcookie("flag", "100",time()-3);
setcookie("flag", "100");
echo "this sucks";
}
?>