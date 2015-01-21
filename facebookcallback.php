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
		
	} 
    else 
    {
        $check=0;

        $token_url = "https://graph.facebook.com/oauth/access_token?type=web_server&client_id="
            . $app_id . "&redirect_uri=http://webrtc-fypgroup11.rhcloud.com/facebookcallback.php&client_secret="
            . $app_secret . "&code=" . $code;

        $access_token = file_get_contents($token_url);

        $_SESSION['accesstoken'] = $access_token;
        $_SESSION['code'] = $code;
        $_SESSION["facebook"] = "true";








        #$_SESSION['accesstoken'] = $_POST['accesstoken'];


        $url1 = 'https://graph.facebook.com/me/?';
        $url2 = 'https://graph.facebook.com/me/friends?';
        


        $json1 = file_get_contents($url1.$access_token);
        $data1 = json_decode($json1,true);

        $user_id = $data1['id'];
        // echo $user_id;

        $url3 = "https://graph.facebook.com/".$user_id."/picture?type=large&redirect=false";

        $photo = "https://graph.facebook.com/".$user_id."/picture?access_token=".$access_token;
        // $sample = new sfFacebookPhoto;
        // $thephotoURL = $sample->getRealUrl($photo);
        // echo $thephotoURL;
        // echo $photo;s


        $json3 = file_get_contents($url3);
        // print_r($json3);
        $data3 = json_decode($json3,true);
        print_r($data3);

        print '<br>';
        print $data3['url'];

        print_r($data1);










       

        $json2 = file_get_contents($url2.$access_token);
        $data2 = json_decode($json2,true);
        $va1=$json1;
        $va2=$json2;
        // print_r($data1);      ////////////////////////////
        #print_r($var2);
        $var=$data1;
        $friends=$data2;

        //creating a cookie for this user
        $expire=time()+60*60*24;
        setcookie('userdata[name]',$data1['first_name'],$expire,'','','',TRUE);
        setcookie('userdata[email]',$data1['email'],$expire,'','','',TRUE);

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


        // inserting into database
        $em=$data1['email'];
        $uname=$data1["id"];
        $fname=$data1["first_name"];
        $lname=$data1["last_name"];
        $fullname=$data["name"];
        $a= hash ( "md5" , $em);








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

        //query the database
        // $query = mysql_query("SELECT * FROM users");

        echo $_COOKIE["userdata[name]"];
        $_POST["userdata[name]"];
        $_POST["userdata[email]"];








// facebook trial
        // $user = $facebook->getUser();
        // $photos     = $facebook->api('/' . $user . '/photos?limit=6');

        // print_r($photos);
        // $json_img = file_get_contents($photo);
        // print_r($json_img);

























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

            echo $url3;

            echo "<td>
                    <img src=\"{$data3}\">
                </td>";

            echo '<img src="'.$url3.'">';

            echo "<a href=http://webrtc-fypgroup11.rhcloud.com/ElasticSVGElements/kidding.php>Go to main page</a>";
            echo "<a href=http://webrtc-fypgroup11.rhcloud.com/usercookie.php>Go to cookie test</a>";

        }
           
            // header("Location: http://webrtc-fypgroup11.rhcloud.com/thisisit.html");
            // exit();

    }

?>











    <!-- echo '<a href="http://webrtc-fypgroup11.rhcloud.com/afterlogin.php?data1='.$json1.'&data2='.$json2.'">Link 2</a>'; -->
    <!-- echo '<a href="http://finalyearproject11.comule.com/">Link for WebRTC</a>'; -->




			
	    <!-- }  -->



        <!-- <img scr= "<?php echo $url3; ?>" > -->




</body>
</html>




	
	
