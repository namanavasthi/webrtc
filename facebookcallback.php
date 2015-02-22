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





        //original callback part




         $url1 = 'https://graph.facebook.com/me/?';
        $url2 = 'https://graph.facebook.com/me/friends?';
        


        $json1 = file_get_contents($url1.$_SESSION['fb_token']);
        $data1 = json_decode($json1,true);

        $id = $data1['id'];
        // echo $user_id;

        $url3 = "https://graph.facebook.com/".$id."/picture?type=large&width=80&height=80";

        $url3_1 = "https://graph.facebook.com/".$id."/picture?type=large";

        $url_country = "https://graph.facebook.com/me/location";

        $json_c = file_get_contents($url_country.$_SESSION['fb_token']);
        $data_c = json_decode($json_c,true);

        echo $data_c;
        echo $json_c;



        // $photo = "https://graph.facebook.com/".$user_id."/picture?access_token=".$access_token;
   

       

        $json2 = file_get_contents($url2.$_SESSION['fb_token']);
        $data2 = json_decode($json2,true);


        $va1=$json1;
        $va2=$json2;
     
        $var=$data1;
        $friends=$data2;

        //creating a cookie for this user
        $expire=time()+60*60*24;
        setcookie('userdata[name]',$data1['first_name'],$expire,'','','',TRUE);
        setcookie('userdata[email]',$data1['email'],$expire,'','','',TRUE);
        setcookie('userdata[img]',$url3_1,$expire,'','','',TRUE);

        // print $data1['first_name'];
        // print '<br>';
        // print $data1['email'];
        // print '<br>';

        // print 'Friends On WebRTC Trial : ';
        // print '<br>';
        // foreach($friends['data'] as $key=>$value)
        // {
        //     print $value['name'];
        //     print '<br>';
        // }

        echo $data1;

        // inserting into database
        $em=$data1['email'];
        $uname=$data1["id"];
        $fname=$data1["first_name"];
        $lname=$data1["last_name"];
        $fullname=$data["name"];
        $a= hash ( "md5" , $em);
        $gender=$data1["gender"];
        $country=$data1["locale"];
        echo $gender;
        echo $country;


        //connect to db
        $connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");

        if (!$connect) {
        die("Connection failed: " .mysql_error());
        } 
        echo 'Connected successfully';

        //connect to the datatbase
        mysql_select_db("webrtc");

        $query = "INSERT INTO users (firstname,lastname,fullname,emailid,hashemail,username) VALUES('$fname','$lname','$fullname','$em','$a','$uname')";

        $result = mysql_query($query);

        echo "query executed succesfully";


        //palakhs db thingy
        //added part for friends

        foreach($friends['data'] as $key=>$value)
        {
            $friendname=$value['name'];
            $query1 = "INSERT INTO friends (friendid,userid,friendname,webrtcid) VALUES('','$a','$friendname','')";
            $result = mysql_query($query1);
        }











        //query the database
        // $query = mysql_query("SELECT * FROM users");

        // echo $_COOKIE["userdata[name]"];

        $_POST["userdata[name]"];
        $_POST["userdata[email]"];


        $check=1;
        if($check==1)
        {
            if(isset($_COOKIE['userdata'])){
                foreach($_COOKIE['userdata'] as $name=>$value){
                    $name=htmlspecialchars($name);
                    $value=htmlspecialchars($value);
                    echo "$name : $value <br />\n";
                    
                }
            }   

            // echo $url3;

            // echo "<td>
            //         <img src=\"{$data3}\">
            //     </td>";

            echo '<br>';

            echo '<img src="'.$url3.'">';

            echo "<a href=http://webrtc-fypgroup11.rhcloud.com/ElasticSVGElements/kidding.php>Go to main page</a>";
            echo "<a href=http://webrtc-fypgroup11.rhcloud.com/usercookie.php>Go to cookie test</a>";

        }
           
            // header("Location: http://webrtc-fypgroup11.rhcloud.com/thisisit.html");
            // exit();

    }


?>



</body>
</html>





    
