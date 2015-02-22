<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Some Site</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
</head> 
<body> 
    <p>im in baby</p>




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
    $app_id = '1511622425778854';
    $app_secret = '5049e96e052e37ee34585d2b9e8daa5e';
    $redirect_url='http://webrtc-fypgroup11.rhcloud.com/facebookcallback.php';

    //3.Initialize application, create helper object and get fb sess
     FacebookSession::setDefaultApplication($app_id,$app_secret);
     $helper = new FacebookRedirectLoginHelper($redirect_url);
     $sess = $helper->getSessionFromRedirect();

    //check if facebook session exists
    if(isset($_SESSION['fb_token'])){
        $sess = new FacebookSession($_SESSION['fb_token']);
    }

    //logout
    $logout = 'http://webrtc-fypgroup11.rhcloud.com/facebookcallback.php?&logout=true';

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
            $image = 'https://graph.facebook.com/'.$id.'/picture?width=300';
            $email = $graph->getProperty('email');
            echo "hi $name <br>";
            echo "your email is $email <br><Br>";
            echo "<img src='$image' /><br><br>";
            // echo "<a href='".$logout."'><button>Logout</button></a>";

            // $params = array( 'next' => 'http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/?&logout=true' );

            // echo '<a href="'.$helper->getLogoutUrl($params).'" >Logout from facebook</a>';

            // $link=$helper->getLogoutUrl($params);

            // echo $link;

            $next = 'http://webrtc-fypgroup11.rhcloud.com/facebookcallback.php?&logout=true';
            $link = $helper->getLogoutUrl($sess,$next);

            $cookie_name="logoutlink";
            $cookie_value=$link;
            setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");


            // echo $link;


            // $logoutUrl = 'https://www.facebook.com/logout.php?next=http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/';
            // echo '<a href="'.$logoutUrl.'" >Logout from facebook</a>';

            echo '<a href="'.$link.'" ><button>Logout from facebook</button></a>';



        }else{
            //else echo login
            echo '<a href="'.$helper->getLoginUrl(array('email')).'" >Login with facebook</a>';
        }





        

?>



</body>
</html>





    
