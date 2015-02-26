<!DOCTYPE html>
<html>
  
  <head>
    <title>WebRTC Video Conferencing</title>
    <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
    <style>
      #video,#otherPeer { width: 300px;}
    </style>
    <script>
    function load() {
      window.location.assign("http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php");
    }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/indexmaincss.css" rel="stylesheet">
  </head>



<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse navbar-static-top">
      
        <div class="navbar-header">
	    <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </a>
        <a class="navbar-brand" href="#">Web RTC</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="http://www.bootply.com" target="ext">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>

    </div>
  </div><!-- /container -->
</div><!-- /navbar wrapper -->


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
  
  <div class="item active">
    <img src="images/phone-booth.jpg" style="width:100%" class="img-responsive">
    <div class="container">
      <div class="carousel-caption">
        <h1>Web RTC Video Conferencing</h1>
        <p></p>
        <!-- <p><a class=btn btn-lg btn-primary href=signupnonfb.php>Create an account</a>   CHANGE  THIS FOR FINAL LINK  -->
        <!-- <a class=btn btn-lg btn-primary href=loginnonfb.html>Login</a>   ADD ACTUAL PAGE HERE!!!!!!!!!!!!!!!!--> 
        <!-- </p>  -->


        <?php

/* INCLUSION OF LIBRARY FILEs*/
  require_once( 'lib/Facebook/FacebookSession.php');
  require_once( 'lib/Facebook/FacebookRequest.php' );
  require_once( 'lib/Facebook/FacebookResponse.php' );
  require_once( 'lib/Facebook/FacebookSDKException.php' );
  require_once( 'lib/Facebook/FacebookRequestException.php' );
  require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
  require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
  require_once( 'lib/Facebook/GraphObject.php' );
  require_once( 'lib/Facebook/GraphUser.php' );
  require_once( 'lib/Facebook/GraphSessionInfo.php' );
  require_once( 'lib/Facebook/Entities/AccessToken.php');
  require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
  require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
  require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */
  
  use Facebook\FacebookSession;
  use Facebook\FacebookRedirectLoginHelper;
  use Facebook\FacebookRequest;
  use Facebook\FacebookResponse;
  use Facebook\FacebookSDKException;
  use Facebook\FacebookRequestException;
  use Facebook\FacebookAuthorizationException;
  use Facebook\GraphObject;
  use Facebook\GraphUser;
  use Facebook\GraphSessionInfo;
  use Facebook\FacebookHttpable;
  use Facebook\FacebookCurlHttpClient;
  use Facebook\FacebookCurl;

/*PROCESS*/
  
  //1.Stat Session
   session_start();

  //check if users wants to logout
   if(isset($_REQUEST['logout'])){
    unset($_SESSION['fb_token']);
   }
  
  //2.Use app id,secret and redirect url 
  $app_id = '955536087794562';
  $app_secret = 'd5a0d6381787072586f2f6849183f51d';
  $redirect_url='http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/';

  //3.Initialize application, create helper object and get fb sess
   FacebookSession::setDefaultApplication($app_id,$app_secret);
   $helper = new FacebookRedirectLoginHelper($redirect_url);
   $sess = $helper->getSessionFromRedirect();

  //check if facebook session exists
  if(isset($_SESSION['fb_token'])){
    $sess = new FacebookSession($_SESSION['fb_token']);
  }

  //logout
  $logout = 'http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/?&logout=true';

  //4. if fb sess exists echo name 
    if(isset($sess)){
      //store the token in the php session
      $_SESSION['fb_token']=$sess->getToken();
      //create request object,execute and capture response
      $request = new FacebookRequest($sess,'GET','/me');
      // from response get graph object
      $response = $request->execute();
      $graph = $response->getGraphObject(GraphUser::classname());
      // use graph object methods to get user details
      $name = $graph->getName();
      $id = $graph->getId();
      // $access_token = $graph->getAccessToken();
      $first_name = $graph->getFirstName();
      $last_name = $graph->getLastName();
      $email = $graph->getProperty('email');
      $image1 = 'https://graph.facebook.com/'.$id.'/picture?type=large&width=80&height=80';
      $image2 = 'https://graph.facebook.com/'.$id.'/picture?type=large';
      $friends_list = (new FacebookRequest( $sess, 'GET', '/me/friends' ))->execute()->getGraphObject()->asArray();
      $gender = $graph->getProperty('gender');

      
      // echo "hi $name <br>";
      // echo "your email is $email <br><Br>";
      // echo "hi $first_name <br>";
      // echo "hi $last_name <br>";
      // echo "$gender <br>";
      

      $next = 'http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/?&logout=true';
      $link = $helper->getLogoutUrl($sess,$next);

      $cookie_name="logoutlink";
      $cookie_value=$link;
      setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");   // for logout button


      //creating a cookie for this user
        $expire=time()+60*60*24;
        setcookie('userdata[name]',$first_name,$expire,'','','',TRUE);
        setcookie('userdata[email]',$email,$expire,'','','',TRUE);
        setcookie('userdata[img]',$image2,$expire,'','','',TRUE);

        $em=$email;
        $uname=$id;
        $fname=$first_name;
        $lname=$last_name;
        $fullname=$name;
        $gender=$gender;
        $a= hash ( "md5" , $em);
    
    //for the image...VERIFY THE SIZESSSSSSSSSSSSSSSSSSSS!!!!!
    $largeimage=$image2;
    $smallimage=$image1;

        //connect to db
        $connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");

        if (!$connect) {
        die("Connection failed: " .mysql_error());
        } 
        // echo 'Connected successfully';

        //connect to the datatbase
        mysql_select_db("webrtc");

        $query = "INSERT INTO users (firstname,lastname,fullname,emailid,hashemail,username,password,country,gender,imagename,image,imagelarge,imagesmall,status) VALUES('$fname','$lname','$fullname','$em','$a','$uname','','$country','$gender','','','$largeimage','$smallimage','Online')"; //check if it works!!!!

        $result = mysql_query($query);

        // echo "query executed succesfully";

        $query1 = mysql_query("SELECT * FROM friends WHERE userid='$a'");

    //  $query = mysql_query("SELECT * FROM users"); //MODIFY TO FRIENDS TABLE
    
        $query_num_rows = mysql_num_rows($query1);

        if ($query_num_rows==0)
        {
          foreach ($friends_list['data'] as $key => $value) {
              $friendname = $value->name;
              $query1 = "INSERT INTO friends (friendid,userid,friendname,webrtcid) VALUES('','$a','$friendname','')";
              $result = mysql_query($query1);
          }
        }

        else {
  $name=array();
  $i=0;
  $count=mysql_num_rows($query1);
  WHILE($rows = mysql_fetch_array($query1)):
  
    $fullname = $rows['friendname'];
      //include('kiddingnext.php');
    $name[$i]=$fullname;
    $i++;
    
  endwhile;
    
  $flag=0;
  
  foreach ($friends_list['data'] as $key => $value) {
        {
            $friendname = $value->name;
      
      for($j=0;$j<$count;$j++)
      {
        if($friendname==$name[$j])
          $flag=0;
        else
        {
          $query1 = "INSERT INTO friends (friendid,userid,friendname,webrtcid) VALUES('','$a','$friendname','')";
          $result = mysql_query($query1);
        }
      }
  
    }
  }
        

//MODIFIED TILL HEREEEEEEE!!!!!!!!!!!!



       


   $_POST["userdata[name]"];
        $_POST["userdata[email]"];


        $check=1;
        if($check==1)
        {
            if(isset($_COOKIE['userdata'])){
                foreach($_COOKIE['userdata'] as $name=>$value){
                    $name=htmlspecialchars($name);
                    $value=htmlspecialchars($value);
                    // echo "$name : $value <br />\n";
                    
                }
            }   

            echo "<p><a class=btn btn-lg btn-primary href=loginnonfb.html>Login</a></p> ";

            echo "<p><a href=http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php>Go to main page</a><p>";
            
            // header("Location: http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php");
            header('Refresh: 1;url=http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php');
            // echo "<script type='text/javascript'> window.onload=load; </script>";
            exit();

        }
           
            // header("Location: http://webrtc-fypgroup11.rhcloud.com/thisisit.html");
            // exit();

    }




















      // echo $link;


      // $logoutUrl = 'https://www.facebook.com/logout.php?next=http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/';
      // echo '<a href="'.$logoutUrl.'" >Logout from facebook</a>';

      // echo '<a href="'.$link.'" ><button>Logout from facebook</button></a>';



    }else{
      //else echo login
      $params = array( 'scope' => 'public_profile, user_friends');
      // echo '<p><a href="'.$helper->getLoginUrl(array('email')).'" >Login with facebook</a></p>';
      echo '<p><a href="'.$helper->getLoginUrl($params).'" >Login with facebook</a></p>';
    }






?>




  





        <!-- change this link -->
        <!--facebook api-->
        <!-- <p><a class="btn btn-lg btn-primary" href="https://graph.facebook.com/oauth/authorize?type=web_server&amp;display=touch&amp;scope=read_friendlists,user_friends,email,manage_friendlists,read_stream,public_profile,user_photos&amp;client_id=1511622425778854&amp;redirect_uri=http://webrtc-fypgroup11.rhcloud.com/facebookcallback.php">Sign-in with Facebook</a>
        </p> -->
      </div>
    </div>
  </div>
</div>

<!-- /.carousel -->

  <!-- FOOTER -->
  <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>Developed by Group11 WebRTC<!-- <a href="http://www.bootply.com/62603">Edit on Bootply.com</a>--></p>
  </footer>

</div><!-- /.container -->



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>

</html>