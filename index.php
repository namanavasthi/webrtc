<!DOCTYPE html>
<html>
  
  <head>
    <title>FINAL YEAR PROJECT muhahaha</title>
    <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
    <style>
      #video,#otherPeer { width: 300px;}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/maincss.css" rel="stylesheet">
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
          <li><a href="/logout" onclick="FB.logout();">Logout</a></li>
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

          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1511622425778854&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
          </script>


          <div class="fb-login-button" data-max-rows="2" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div>

          <p><a class="btn btn-lg btn-primary" href="<?php echo $login ?>">Sign-in with Facebook</a>
            <!-- echo '<a href="'.$helper->getLoginUrl(array('email')).'" >Login with facebook</a>'; -->
            <!-- <a href="http://webrtc-fypgroup11.rhcloud.com/url.php">try this</a> -->
        </p>
        </div>
      </div>
    </div>
    
  </div>
  
</div>



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






<?php
/*  FACEBOOK LOGIN + LOGOUT - PHP SDK V4.0
 *  file            - index.php
 *  Developer       - Krishna Teja G S
 *  Website         - http://packetcode.com/apps/fblogin-basic/
 *  Date            - 27th Sept 2014
 *  license         - GNU General Public License version 2 or later
*/

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
    $redirect_url='http://webrtc-fypgroup11.rhcloud.com/';

    //3.Initialize application, create helper object and get fb sess
     FacebookSession::setDefaultApplication($app_id,$app_secret);
     $helper = new FacebookRedirectLoginHelper($redirect_url);
     $sess = $helper->getSessionFromRedirect();

    //check if facebook session exists
    if(isset($_SESSION['fb_token'])){
        $sess = new FacebookSession($_SESSION['fb_token']);
    }

    $login=$helper->getLoginUrl(array('email'));

?>