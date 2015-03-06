<?php

		$connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
		mysql_select_db("webrtc");
		$name=$_COOKIE['userdata']['name'];
		$hashem=$_COOKIE['userdata']['email'];
		$hashem=hash("md5",$hashem);
		$fn=$_COOKIE['friendname'];
		$sender=$_COOKIE['sender'];
		//echo $sender;
		//$query=mysql_query("UPDATE users SET status='Busy' WHERE hashemail='$hashem'");
		$query=mysql_query("SELECT callstatus FROM friends WHERE userid='$hashem' AND friendname='$fn'");
		//echo $query['callstatus'];
		WHILE ($rows=mysql_fetch_array($query)):
			$status=$rows['callstatus'];
			//$webrtcid=$rows['webrtcid'];
			//echo $status;
			if ($status=='rejected')
			{
				$query1=mysql_query("UPDATE friends SET callstatus='' WHERE userid='$hashem' AND friendname='$fn'");
				echo"<script>
				alert('$fn has rejected your call!');
				window.location.href='homepage.php';
				</script>
				
				";
			}
		endwhile;
		//echo "lavdeh";
		//$query1=mysql_query("SELECT `webrtcid` FROM `friends` WHERE (`userid`='$hashem' AND `friendname`='$fn') OR (`username`='$sender' AND `friendname`='$name')"); //WORK ON THISSSSSSSS!!!!!!!!
		
		if($sender=='NULL')
		{
		$query1=mysql_query("SELECT `webrtcid` FROM `friends` WHERE (`userid`='$hashem' AND `friendname`='$fn')");
		WHILE ($rows=mysql_fetch_array($query1)):
			//$status=$rows['callstatus'];
			$webrtcid=$rows['webrtcid'];
		//	echo $webrtcid;
			//echo $sender;
			if($webrtcid=='')
			{
				echo"<script>
				alert('The other party has ended the call!');
				window.location.href='homepage.php';
				</script>
				
				";
			}
		endwhile;
		}
		
		else
		{
		$query1=mysql_query("SELECT `webrtcid` FROM `friends` WHERE (`username`='$sender' AND `friendname`='$name')");
		WHILE ($rows=mysql_fetch_array($query1)):
			//$status=$rows['callstatus'];
			$webrtcid=$rows['webrtcid'];
			//echo $sender;
			//echo $webrtcid;
			if($webrtcid=='')
			{
				echo"<script>
				alert('The other party has ended the call!');
				window.location.href='homepage.php';
				</script>
				
				";
			}
		endwhile;
		}
?>