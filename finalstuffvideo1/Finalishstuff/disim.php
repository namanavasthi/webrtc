<?php
//connect to db
mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
mysql_select_db("webrtc");

//$id=addslashes($_REQUEST['id']);
$name=$_GET['id'];

$image=mysql_query("SELECT * FROM users where fullname='$name'");
$image=mysql_fetch_assoc($image);
$image=$image['image'];

header('Content-Type: image/jpeg');
echo $image;

?>