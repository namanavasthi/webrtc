<html>

<?php
$conn=mysql_connect("localhost","root","");
mysql_select_db("webrtc");
$sendername=$_REQUEST['sendername'];
$senderid=$_REQUEST['senderid'];
$senderidhash=hash('md5',$senderid);
//echo $friendname;

$username=$_COOKIE['userdata']['name'];
//$username='Emma Stone';
$userid=$_COOKIE['userdata']['email'];
//$userid='emma@gmail.com';
$useridhash=hash('md5',$userid);
//echo $userid;

//$query = mysql_query("INSERT INTO friends (username,userid,friendname,webrtcid,callstatus) VALUES('$username','$useridhash','$sendername','','')");
//$query1 = mysql_query("INSERT INTO friends (username,userid,friendname,webrtcid,callstatus) VALUES('$sendername','$senderidhash','$username','','')");

$query2 = mysql_query("UPDATE notifications SET viewstatus='seen',requeststatus='rejected' WHERE username='$userid' AND friendrequestemailid='$senderid'");

//$sql="DELETE FROM notifications WHERE id='1' LIMIT 1";

header('Location:notifications.php');
?>
</html>