<?php

include('search.php');

?>
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
		<link rel="webrtc icon" href="images/webrtc_ico.ico"/>
		
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

				<!-- bootstrap scripts -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- end of bootstrap scripts -->



<style>
			.badge-notify{
			   background:red;
			   position:relative;
			   top: -15px;
			   /*left: -35px;*/
			}

		</style>

<style>
  .navbar-brand img{
    width: 45px;
    height: 35px;
    margin-top: -7px;
    margin-right: 3px;
    float: left;
  }
</style>





	</head>
	<body>



<!-- navbar header -->

	<div class="navbar-wrapper" id="nav_re">
  <div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse navbar-static-top">
      
        <div class="navbar-header">
	    <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </a>
        <a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php"><img src="images/webrtc.png">Vid3Com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/aboutus/aboutus.html" target="ext">About</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/contactus.php">Contact</a></li>
            <li>
				<!-- <div class="container"> -->
				<a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/notifications.php">
					<!-- <button class="btn btn-default btn-lg btn-link" style="font-size:36px;"> -->
						<span class="glyphicon glyphicon-comment"></span>
						Notification
					<!-- </button> -->
					<!-- <span class="badge badge-notify"> -->
						<?php 
							mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
							mysql_select_db("webrtc");
							$name=$_COOKIE['userdata']['email'];
							//$name='emma@gmail.com';
							$query = mysql_query("SELECT * FROM notifications WHERE username='$name' AND viewstatus<>'seen'");
							$count=mysql_num_rows($query);
							if ($count!=0) {
									echo "<span class='badge badge-notify'>$count</span>";
								}
						?>
					<!-- </span> -->
				<!-- </div> -->
				</a>
			</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<?php
				$cookie_name="logoutlink1";
				if(!isset($_COOKIE[$cookie_name])) {
				    echo "<li><a href='http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/' alt='Logout'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>Logout&nbsp;&nbsp;</a></li>";
				} else {
				    $link=$_COOKIE[$cookie_name];
				}
				echo "<li><a href='".$link."' alt='Logout from Facebook'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>Logout&nbsp;&nbsp;</a></li>";
			?>
			</ul>
        </div>

    </div>
  </div><!-- /container -->
</div><!-- /navbar wrapper -->

<!-- end of navbar -->





<br>
<br>
<br>
















		<?php
			

			//$sval=$_GET["sval"];
			//print $sval;
			//connect to the server
			$connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");

			//connect to the datatbase
			mysql_select_db("webrtc");
			//$query = mysql_query("SELECT * FROM hospitals WHERE fullname='$sval'");
			$a=$_COOKIE['userdata']['email'];
			//echo $name;
			$a=hash("md5",$a);
			//echo $name;

			//THIS IS FOR ONLINE FRIENDS!!!


			$query = mysql_query("SELECT `fullname`,`imagename`,`imagelarge` FROM `users` WHERE (`status`='Online' OR `status`='Busy') AND `fullname` in (SELECT `friendname` FROM `friends` WHERE `userid`='$a')");
			$num_rows=mysql_num_rows($query);
			$count=$num_rows;
			//secho "online".$count;
			$temp=$count-1;
			//echo $temp;
			$i=0;
			$name=array();
			$image=array();
			WHILE($rows = mysql_fetch_array($query)):

				$fullname = $rows['fullname'];	
				$name[$i]=$fullname;
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


			//var_dump($name);
			//var_dump($image);
			$p=0;
			echo"<div class='container'>
					<div class='grid'> 
						ONLINE FRIENDS
					</div>
				</div>";

			//ADDDDDDDDDDEEEEEEEEEEEEDDDDDDDDDDDDDDDDDDDDD

			if($count==0)
			{
				"No one seems to be online right now";
			}
			else{
				for($j=0;$j<=$count;$j++)
				{

					if ($count==1)
					{
						echo"<div class='container'>
						<div class='grid'>
						<figure class='effect-winston'>
						<img src='img/30.jpg' alt='img30'/>
						<figcaption>
						<h2>$name[0]</h2>
						<p>
						<a href='profile.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
						</p>
						</figcaption>			
						</figure>
						</div>
						</div>";
						break;
					} 

					if($count % 2!=0)
					{

						for ($k=0;$k<=$count-1;$k++)
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
							<a href='profile.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>	
							</p>
							</figcaption>			
							</figure>
							<figure class='effect-winston'>
							<img src='$image[$m]' alt='img01'/>
							<figcaption>
							<h2>$name[$m]</h2>
							<p>
							<a href='profile.php?firstname=$name[$m]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
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
												<a href='profile.php?firstname=$name[$q]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
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
											<a href='profile.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
										</p>
									</figcaption>	 	
								</figure> 
								<figure class='effect-winston'>
									<img src='$image[$l]' alt='img01'/>
									<figcaption>
										<h2>$name[$l]</h2>
										<p>
											<a href='profile.php?firstname=$name[$l]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
										</p>
									</figcaption>			
								</figure>
							</div> 


							</div><!-- /container -->";
							$p++;
						}

					}
					echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
						if($count>0)
					echo"<h2><a href=presearchresults2.php?count=$count>NEXT</a></h2>";	
				}
			//TILL HERE!!!!!!!!!!!!!!!!!






			//THIS IS FOR OFFLINE FRIENDS!!!


				$query = mysql_query("SELECT `fullname`,`imagename`,`imagelarge` FROM `users` WHERE `status`='Offline' AND `fullname` in (SELECT `friendname` FROM `friends` WHERE `userid`='$a')");
				$num_rows=mysql_num_rows($query);
				$count=$num_rows;
				//echo "offline".$count;
				$temp=$count-1;
				//echo $temp;
				$i=0;
				$name=array();
				$image=array();
				WHILE($rows = mysql_fetch_array($query)):

					$fullname = $rows['fullname'];	
					$name[$i]=$fullname;
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


				//var_dump($name);
				//var_dump($image);
				$p=0;
				if($count>0) {
					echo"<div class='container'>
							<div class='grid'> 
								OFFLINE FRIENDS
							</div>
						</div>";

				for($j=0;$j<=$count;$j++)
				{

					if ($count==1)
					{
						echo"<div class='container'>
							<div class='grid'>
								<figure class='effect-winston'>
									<img src='img/30.jpg' alt='img30'/>
									<figcaption>
										<h2>$name[0]</h2>
										<p>
											<a href='profile.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
										</p>
									</figcaption>			
								</figure>
							</div>
						</div>";
						break;
					} 

					if($count % 2!=0)
					{

						for ($k=0;$k<=$count-1;$k++)
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
												<a href='profile.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>	
											</p>
										</figcaption>			
									</figure>
									<figure class='effect-winston'>
										<img src='$image[$m]' alt='img01'/>
										<figcaption>
											<h2>$name[$m]</h2>
											<p>
												<a href='profile.php?firstname=$name[$m]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
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
						<a href='profile.php?firstname=$name[$q]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
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
											<a href='profile.php?firstname=$name[$p]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
										</p>
									</figcaption>	 	
								</figure> 
								<figure class='effect-winston'>
									<img src='$image[$l]' alt='img01'/>
									<figcaption>
										<h2>$name[$l]</h2>
										<p>
											<a href='profile.php?firstname=$name[$l]'><i class='fa fa-fw fa-user' title='VIEW PROFILE'></i></a>
										</p>
									</figcaption>			
								</figure>
							</div> 
						</div><!-- /container -->";
						$p++;
					}

				}
				echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
				if($count>0)
					echo"<h2><a href=presearchresults2.php?count=$count>NEXT</a></h2>";  
			}
		?>

	</body>
</html>