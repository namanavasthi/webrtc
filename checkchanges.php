<?php
echo 'opened';

$flag=0;
$name="Naman";

$connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");

if (!$connect) {
	die("Connection failed: " .mysql_error());
} 
echo 'Connected successfully';

//connect to the datatbase
mysql_select_db("webrtc");

$query = "SELECT * FROM users WHERE firstname = '".$name);

// while($flag>0){
// 	$result = mysql_query($query);

// 	if(mysql_num_rows($result) != 0) {
//         echo "query executed succesfully";
//         $flag=2;
// 	}
// }



?>