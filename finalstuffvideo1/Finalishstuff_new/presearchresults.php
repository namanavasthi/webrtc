<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!--<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,500,600' rel='stylesheet' type='text/css'> -->
		<link rel="stylesheet" type="text/css" href="css/searchresultsnormalize.css" />
		<link rel="stylesheet" type="text/css" href="css/searchresultsdemo.css" />
		<link rel="stylesheet" type="text/css" href="css/searchresults.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>

	<?php
	include('search.php');
	
	$sval=$_GET["sval"];  
	
	//else 
	//{
	//print $sval;
	//connect to the server
	$connect = mysql_connect("localhost","root","");

	//connect to the datatbase
	//mysql_select_db("userdata");
	mysql_select_db("webrtc");
	//$query = mysql_query("SELECT * FROM chemists");
	//$query = mysql_query("SELECT fullname,emailid,imagelarge,imagename FROM users WHERE firstname='$sval' or lastname='$sval' or fullname='$sval'");
	$query = mysql_query("SELECT `fullname`,`imagename`,`imagelarge`,`emailid` FROM `users` WHERE `fullname` in (SELECT `fullname` FROM `users` WHERE firstname='$sval' or lastname='$sval' or fullname='$sval')");
	
	//echo $count;
	$num_rows=mysql_num_rows($query);
	$count=$num_rows;
	$temp=$count-1;
	//echo $temp;
		$i=0;
		$email=array();
		$image=array();
		$name=array();
		//$query = mysql_query("SELECT fullname,emailid,imagelarge,imagename FROM users WHERE firstname='$sval' or lastname='$sval' or fullname='$sval'");
	$query = mysql_query("SELECT `fullname`,`imagename`,`imagelarge`,`emailid` FROM `users` WHERE `fullname` in (SELECT `fullname` FROM `users` WHERE firstname='$sval' or lastname='$sval' or fullname='$sval')");
	
	
	WHILE($rows = mysql_fetch_array($query)):
		
		$fullname = $rows['fullname'];	
		$emailid = $rows['emailid'];	
		$imagename=$rows['imagename'];
		$name[$i]=$fullname;
		$email[$i]=$emailid;
		if($rows['imagename'!=''])
		{
			$image[$i]='disim.php?id='.$name[$i];
		}
		else
		{
			$image[$i]=$rows['imagelarge'];
		}
		$i++;
	endwhile;
	//var_dump($image);
	
	$p=0;
	for($j=0;$j<$count;$j++)
	{
	
		if ($count==1)
		{
			echo"<div class='container'>
				<div class='grid'>
					<figure class='effect-winston'>
						<img src='$image[0]' alt='img30'/>
						<figcaption>
							<h2>$name[0]</h2>
							<p>
								<a href='user.php?firstname=$name[0]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
								<a href='search1.php?email=$email[0]&name=$name[0]'><i class='fa fa-fw fa-plus-circle' title='ADD AS FRIEND'></i></a>
							</p>
						</figcaption>			
					</figure>
				</div>
			</div>";
			break;
		} 
		
		if($count % 2!=0)
		{
			
			for ($k=0;$k<$count-1;$k++)
			{
			//echo $temp; 
				//echo"<br>";
				if($p!=0)
				{
					$p=$p+1;
				}
				$m=$p+1;
				//echo "This izzzs!!".$m;
				//echo $name[$p]." ".$name[$m]."<br>";
				$count=$count-2;
			//	$temp=$temp-2;
				//echo $count; 
				
				echo"<div class='container'>
		<br><br><br><br><br><br><br><br><br><br>
				<div class='grid'>
					<figure class='effect-winston'>
						<img src='$image[$p]' alt='img30'/>
						<figcaption>
							<h2>$name[$p]</h2>
							<p>
								<a href='user.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
								<a href='search1.php?email=$email[$p]&name=$name[$p]'><i class='fa fa-fw fa-plus-circle' title='ADD AS FRIEND'></i></a>
								</p>
						</figcaption>			
					</figure>
					<figure class='effect-winston'>
						<img src='$image[$m]' alt='img01'/>
						<figcaption>
							<h2>$name[$m]</h2>
							<p>
								<a href='user.php?firstname=$name[$m]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
								<a href='search1.php?email=$email[$m]&name=$name[$m]'><i class='fa fa-fw fa-plus-circle' title='ADD AS FRIEND'></i></a>
								</p>
						</figcaption>			
					</figure>
				</div> 
				
		
		</div><!-- /container -->";
					$p++;
			}
			
			//echo $count; 
			//echo"<br>";
			//echo $name[$m+1]."<br>";
			$q=$p+1;
			$count--;
		//	$temp--;
			//echo $count; 
			echo"<div class='container'>
				<div class='grid'>
					<figure class='effect-winston'>
						<img src='$image[$q]' alt='img30'/>
						<figcaption>
							<h2>$name[$q]</h2>
							<p>
								<a href='user.php?firstname=$name[$q]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
								<a href='search1.php?email=$email[$q]&name=$name[$q]'><i class='fa fa-fw fa-plus-circle' title='ADD AS FRIEND'></i></a>
							</p>
						</figcaption>			
					</figure>
				</div>
			</div>"; 
			break; 
		}
		else
		{
			//echo $count; 
			//echo"<br>";
			if($p!=0)
				{
					$p=$p+1;
				}
			$l=$p+1;
			
			//echo $name[$j]." ".$name[$j+1]."<br>";
			$count=$count-2;
			//echo $count; 
			
			echo"<div class='container'>
		<br><br><br><br><br><br><br><br><br><br>
				<div class='grid'>
					<figure class='effect-winston'>
						<img src='$image[$p]' alt='img30'/>
						<figcaption>
							<h2>$name[$p]</h2>
							<p>
							<a href='user.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
								<a href='search1.php?email=$email[$p]&name=$name[$p]'><i class='fa fa-fw fa-plus-circle' title='ADD AS FRIEND'></i></a>	
							</p>
						</figcaption>			
					</figure>
					<figure class='effect-winston'>
						<img src='$image[$l]' alt='img01'/>
						<figcaption>
							<h2>$name[$l]</h2>
							<p>
								<a href='user.php?firstname=$name[$l]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
								<a href='search1.php?email=$email[$l]&name=$name[$l]'><i class='fa fa-fw fa-plus-circle' title='ADD AS FRIEND'></i></a>
								
							</p>
						</figcaption>			
					</figure>
				</div> 
				
		
		</div><!-- /container -->";
			$p++;
		}
		
	}
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
	if ($count>0) {
	echo"
	<h2><a href=presearchresults2.php?count=$count>NEXT</a></h2>";	
	}
	//}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*WHILE($rows = mysql_fetch_array($query)):
	
		$fullname = $rows['fullname'];
		//print $fullname;
		//$last_name = $rows['lastname'];
		//$email = $rows['emailid'];
		//while($num_rows>0):
			if($num_rows & 1==0)
			{
		
				//for even
				$num_rows=$num_rows/2;
			//	include('searchresults1.php');
				include('searchresults2.php');
				break;
			
			}
			else
			{
				//for odd
				if($num_rows & 1)
				{
					//print 'odd';
					$num_rows=$num_rows/2;
					include('searchresults2.php');
				}
				else
				{
					//print 'even';
					include('searchresults2.php');
				}
			}
			$num_rows-=1;
		//endwhile;
	endwhile;			//for outer while	
	*/
	?>
		
	</body>
</html>