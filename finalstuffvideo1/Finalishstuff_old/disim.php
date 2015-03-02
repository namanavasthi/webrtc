<?php
//connect to db
mysql_connect("localhost","root","");
mysql_select_db("webrtc");

//$id=addslashes($_REQUEST['id']);
$name=$_GET['id'];

$image=mysql_query("SELECT * FROM users where firstname='$name'");
$image=mysql_fetch_assoc($image);
$image=$image['image'];

header('Content-Type: image/jpeg');
echo $image;

?>