<?php
//connect to db
mysql_connect("localhost","root","");
mysql_select_db("webrtc");

//$id=addslashes($_REQUEST['id']);
$emailid=$_COOKIE['userdata']['email'];

$image=mysql_query("SELECT * FROM users where firstname='$emailid'");
$image=mysql_fetch_assoc($image);
$image=$image['image'];
/*
//added to resize


// Content type


// Get new sizes
list($width, $height) = getimagesize($image);
$newwidth = 150;
$newheight = 150;

// Load

$source = imagecreatefromjpeg($image);
$image = imagecreatetruecolor($newwidth, $newheight);

// Resize
imagecopyresized($image, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
$image=imagejpeg($thumb); */

echo $image;

header('Content-Type: image/jpeg');
//echo $image;
?>