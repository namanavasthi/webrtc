<?php
session_start();
?>
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




    $app_id = "1511622425778854";
    $app_secret = "5049e96e052e37ee34585d2b9e8daa5e";
    
    $code = $_GET["code"];
	$error = $_GET["error_reason"];
	if ($error == "user_denied") {
?>
			<p>I'm sorry you weren't interested in using Facebook.</p>
            <a href="http://webrtc-fypgroup11.rhcloud.com">Go Back To Main Page</a>
			
				
<?php
		
	} else {

    $token_url = "https://graph.facebook.com/oauth/access_token?type=web_server&client_id="
        . $app_id . "&redirect_uri=http://webrtc-fypgroup11.rhcloud.com/facebookcallback.php&client_secret="
        . $app_secret . "&code=" . $code;

    $access_token = file_get_contents($token_url);

	$_SESSION['accesstoken'] = $access_token;
	$_SESSION['code'] = $code;
 	$_SESSION["facebook"] = "true";

    $accesstoken=$_SESSION['accesstoken'];
    $_SESSION['accesstoken'] = $_POST['accesstoken']


	$url1 = 'https://graph.facebook.com/me/?';
	$url2 = 'https://graph.facebook.com/me/friends?';
    $json1 = file_get_contents($url1.$access_token);
    $data1 = json_decode($json1,true);

    $json2 = file_get_contents($url2.$access_token);
    $data2 = json_decode($json2,true);
    $va1=$json1;
    $va2=$json2;
    #print_r($json1);
    #print_r($var2);
    
    $_SESSION['firstname'] = $_POST[$data1];

    print $data1['first_name'];
    print '<br>';
    print $data1['email'];
    print '<br>';



    $friends=$data2;

     print 'Friends On WebRTC Trial : ';
     print '<br>';
     foreach($friends['data'] as $key=>$value)
     {
            print $value['name'];
            print '<br>';
     }

    # $json1="muhahaha (this is aweomse asdasd)";
    # $json2="muhahaha (this is aweomse asdasd)";


    echo '<a href="http://webrtc-fypgroup11.rhcloud.com/afterlogin.php?data1='.$json1.'&data2='.$json2.'">Link 2</a>';
    echo '<a href="http://finalyearproject11.comule.com/">Link for WebRTC</a>';




			
	    } 

?>






	
	
