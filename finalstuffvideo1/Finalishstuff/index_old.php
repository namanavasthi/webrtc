<!DOCTYPE html>
<!-- this is the final one -->
<html>
  
  <head>
    <title>WebRTC Video Conferencing</title>
    <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
    <style>
      #video,#otherPeer { width: 300px;}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/indexmaincss.css" rel="stylesheet">

    <style>
  .navbar-brand img{
    width: 45px;
    height: 35px;
    margin-top: -7px;
    float: left;
    margin-right: 3px;
  }
</style>
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
        <a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php"><img src="images/webrtc.png">Vid3Com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
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
  <!-- Indicators -->
 <!--  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol> -->
  <!-- <div class="carousel-inner"> -->
    <div class="item active">
      <img src="images/phone-booth.jpg" style="width:100%" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <h1>Web RTC Video Conferencing</h1>
          <p></p>
		  <!-- <p><a class="btn btn-lg btn-primary" href="signupnonfb.php">Create an account</a>   CHANGE  THIS FOR FINAL LINK  -->
            <!-- <a class="btn btn-lg btn-primary" href="loginnonfb.html">Login</a> -->  <!-- ADD ACTUAL PAGE HERE!!!!!!!!!!!!!!!!-->
        <!-- </p> -->
			<!--facebook api-->				
          <!-- <p><a class="btn btn-lg btn-primary" href="https://graph.facebook.com/oauth/authorize?type=web_server&amp;display=touch&amp;scope=read_friendlists,user_friends,email,manage_friendlists,read_stream,public_profile,user_photos&amp;client_id=1511622425778854&amp;redirect_uri=http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/facebookcallback.php">Sign-in with Facebook</a> -->
            <!-- <a href="http://webrtc-fypgroup11.rhcloud.com/url.php">try this</a> -->

        <!-- </p> -->
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
  $app_id = '1511622425778854'; //made changes here
  $app_secret = '5049e96e052e37ee34585d2b9e8daa5e';   //made changes here
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

      $cookie_name="logoutlink1";
      $cookie_value=$link;
      setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");   // for logout button


      //creating a cookie for this user
        $expire=time()+60*60*24;
        setcookie('userdata[name]',$name,$expire,'','','',TRUE);
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

        $query = "INSERT INTO users (firstname,lastname,fullname,emailid,hashemail,username,password,country,gender,imagename,image,imagelarge,imagesmall,status) VALUES('$fname','$lname','$fullname','$email','$a','$uname','','$country','$gender','','','$largeimage','$smallimage','Online')"; //check if it works!!!!

        // $result = mysql_query($query);

        echo "this is after insert into db";

        // echo "query executed succesfully";

        // $query1 = mysql_query("SELECT * FROM friends WHERE userid='$a'");

     // $query = mysql_query("SELECT * FROM users"); //MODIFY TO FRIENDS TABLE
    
  //       $query_num_rows = mysql_num_rows($query1);

  //       if ($query_num_rows==0)
  //       {
  //         foreach ($friends_list['data'] as $key => $value) {
  //             $friendname = $value->name;
  //             $query1 = "INSERT INTO friends (friendid,userid,friendname,webrtcid,callstatus,type) VALUES('','$a','$friendname','','','NULL')";
  //             $result = mysql_query($query1);
  //         }
  //       }

  //       else {
  // $name=array();
  // $i=0;
  // $count=mysql_num_rows($query1);
  // WHILE($rows = mysql_fetch_array($query1)):
  
  //   $fullname = $rows['friendname'];
  //     //include('kiddingnext.php');
  //   $name[$i]=$fullname;
  //   $i++;
    
  // endwhile;
    
  // $flag=0;
  
  // foreach ($friends_list['data'] as $key => $value) {
  //       {
  //           $friendname = $value->name;
      
  //     for($j=0;$j<$count;$j++)
  //     {
  //       if($friendname==$name[$j])
  //         $flag=0;
  //       else
  //       {
  //         $query1 = "INSERT INTO friends (friendid,userid,friendname,webrtcid,callstatus,type) VALUES('','$a','$friendname','','','NULL')";
  //         $result = mysql_query($query1);
  //       }
  //     }
  
  //   }
  // }
        

//MODIFIED TILL HEREEEEEEE!!!!!!!!!!!!



// new palakh stuff

        echo "palakh stuff started";


foreach($friends_list['data'] as $key=>$value)
        {
            // $friendname=$value['name'];
            $friendname = $value->name;
            $query1 = "INSERT INTO friends (friendid,userid,friendname,webrtcid,callstatus,type) VALUES('','$a','$friendname','','','NULL')";
            $result = mysql_query($query1);
        }

        echo "this is after insert into friends";



// till here















       echo "before posting of name and email";


   $_POST["userdata[name]"];
        $_POST["userdata[email]"];


        $check=1;
        if($check==1)
        {
            if(isset($_COOKIE['userdata'])){
              echo "cookie value set";
                foreach($_COOKIE['userdata'] as $name=>$value){
                    $name=htmlspecialchars($name);
                    $value=htmlspecialchars($value);
                    // echo "$name : $value <br />\n";
                    
                }
            }   

            

            echo "<p>Please Wait while page is loading</p>";

            echo "<p><a href=http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php>Go to main page</a><p>";
            
            // header("Location: http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php");
            header('Refresh: 1;url=http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php');
            // echo "<script type='text/javascript'> window.onload=load; </script>";
            exit();

        }
           
            // header("Location: http://webrtc-fypgroup11.rhcloud.com/thisisit.html");
            // exit();
        echo "not outside isset session";

    }



echo "outside isset";
















      // echo $link;


      // $logoutUrl = 'https://www.facebook.com/logout.php?next=http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/';
      echo '<a href="'.$next.'" >Logout from facebook</a>';

      // echo '<a href="'.$link.'" ><button>Logout from facebook</button></a>';



    }else{
      //else echo login
      echo "<p><a class='btn btn-lg btn-primary' href=loginnonfb.html>Login</a></p> ";
      $params = array( 'scope' => 'public_profile, user_friends, email');
      // echo '<p><a href="'.$helper->getLoginUrl(array('email')).'" >Login with facebook</a></p>';
      echo "<p><a class='btn btn-lg btn-primary' href='".$helper->getLoginUrl($params)."' >Login with facebook</a></p>";
    }






?>
		
        </div>
      </div>
    </div>
    
  </div>
  
</div>
<!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<!-- <div class="container marketing"> -->

  <!-- Three columns of text below the carousel -->
  <!-- <div class="row">
    <div class="col-md-4 text-center">
      <img class="img-circle" src="http://placehold.it/140x140">
      <h2>Mobile-first</h2>
      <p>Tablets, phones, laptops. The new 3 promises to be mobile friendly from the start.</p>
      <p><a class="btn btn-default" href="#">View details »</a></p>
    </div>
    <div class="col-md-4 text-center">
      <img class="img-circle" src="http://placehold.it/140x140">
      <h2>One Fluid Grid</h2>
      <p>There is now just one percentage-based grid for Bootstrap 3. Customize for fixed widths.</p>
      <p><a class="btn btn-default" href="#">View details »</a></p>
    </div>
    <div class="col-md-4 text-center">
      <img class="img-circle" src="http://placehold.it/140x140">
      <h2>LESS is More</h2>
      <p>Improved support for mixins make the new Bootstrap 3 easier to customize.</p>
      <p><a class="btn btn-default" href="#">View details »</a></p>
    </div>
  </div> --><!-- /.row -->


  <!-- START THE FEATURETTES -->

 <!--  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">
    <h2 class="featurette-heading">Responsive Design. <span class="text-muted">It'll blow your mind.</span></h2>
    <p class="lead">In simple terms, a responsive web design figures out what resolution of device it's being served on. Flexible grids then size correctly to fit the screen.</p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image img-circle pull-left" src="http://placehold.it/512">
    <h2 class="featurette-heading">Smaller Footprint. <span class="text-muted">Lightweight.</span></h2>
    <p class="lead">The new Bootstrap 3 promises to be a smaller build. The separate Bootstrap base and responsive.css files have now been merged into one. There is no more fixed grid, only fluid.</p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">
    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Flatness.</span></h2>
    <p class="lead">A big design trend for 2013 is "flat" design. Gone are the days of excessive gradients and shadows. Designers are producing cleaner flat designs, and Bootstrap 3 takes advantage of this minimalist trend.</p>
  </div>

  <hr class="featurette-divider"> -->

  <!-- /END THE FEATURETTES -->


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