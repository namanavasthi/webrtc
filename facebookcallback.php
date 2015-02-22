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


    //4. if fb sess exists echo name 
      
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

            $next = 'http://webrtc-fypgroup11.rhcloud.com/?&logout=true';
            $link = $helper->getLogoutUrl($sess,$next);

            $cookie_name="logoutlink";
            $cookie_value=$link;
            setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");


            // echo $link;


            // $logoutUrl = 'https://www.facebook.com/logout.php?next=http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/';
            // echo '<a href="'.$logoutUrl.'" >Logout from facebook</a>';

            echo '<a href="'.$link.'" ><button>Logout from facebook</button></a>';



        





        

?>



</body>
</html>





    
