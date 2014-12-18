<?php
session_start();

?>

<?php
$at = $_SESSION['accesst'];
$fn = $_SESSION['fn'];
$em = $_SESSION['em'];

$_SESSION['fnn'] = $fn;
$_SESSION['emm'] = $em;


#echo 'this is it man'.$at.'Link 2'.$v.' haha';
print '<br>';
print '<br>';
print_r($at);
print '<br>';
#print $at['first_name'];
print $fn;
print '<br>';
print $em;
print '<br>';
print 'without any variable just with _SESSION value : '.$_SESSION['fn']. '<br> and the email id is : '.$_SESSION['em']. '';

?>

<html xmlns:fb="https://www.facebook.com/2008/fbml">
  <head> 
    <title> 
      AFTER LOGIN
    </title> 
  </head> 

  <body>
<a href="http://webrtc-fypgroup11.rhcloud.com/multichat.html">for multi chat</a>
  </body>

  <!--    
<body> 

<div id="fb-root"></div>
<div id="user-info"></div>
<p><button id="fb-auth">Login</button></p>

<script>
window.fbAsyncInit = function() {
  FB.init({ appId: '955536087794562', 
        status: true, 
        cookie: true,
        xfbml: true,
        oauth: true});
function updateButton(response) {
    var button = document.getElementById('fb-auth');
        
    if (response.authResponse) {
      //user is already logged in and connected
      var userInfo = document.getElementById('user-info');
      FB.api('/me', function(response) {
        userInfo.innerHTML = '<img src="https://graph.facebook.com/' 
      + response.id + '/picture">' + response.name;
        button.innerHTML = 'Logout';
      });



      //add FB.api for friends here
      var userInfo2 = document.getElementById('user-info');
      FB.api("/me/friends", function(response) {
        if (response && !response.error) {
        userInfo2.innerHTML = '<img src="https://graph.facebook.com/' 
      + response.id + '/picture">' + response.name;
        button.innerHTML = 'Logout';
    }
      });




      button.onclick = function() {
        FB.logout(function(response) {
          var userInfo = document.getElementById('user-info');
          userInfo.innerHTML="";
    });
      };
    }else {
      //user is not connected to your app or logged out
      button.innerHTML = 'Login';
      button.onclick = function() {
        FB.login(function(response) {
      if (response.authResponse) {
            FB.api('/me', function(response) {
          var userInfo = document.getElementById('user-info');
          userInfo.innerHTML = 
                '<img src="https://graph.facebook.com/' 
            + response.id + '/picture" style="margin-right:5px"/>' 
            + response.name;
        });    
          } else {
            //user cancelled login or did not grant authorization
          }
        }, {scope:'email'});    
      }
    }
  }

  // run once with current status and whenever the status changes
  FB.getLoginStatus(updateButton);
  FB.Event.subscribe('auth.statusChange', updateButton);    
};
    
(function() {
  var e = document.createElement('script'); e.async = true;
  e.src = document.location.protocol 
    + '//connect.facebook.net/en_US/all.js';
  document.getElementById('fb-root').appendChild(e);
}());

</script>
</body> 
-->
</html>














<?php

#bullshit
    $token_url = "https://graph.facebook.com/oauth/access_token?type=web_server&client_id="
        . $app_id . "&redirect_uri=http://webrtc-fypgroup11.rhcloud.com/facebookcallback.php&client_secret="
        . $app_secret . "&code=" . $code;

    $access_token = file_get_contents($token_url);

    $_SESSION['accesstoken'] = $access_token;
    $_SESSION['code'] = $code;
    $_SESSION["facebook"] = "true";

#end of bullshit

    $url2 = 'https://graph.facebook.com/me/friends?';
    $json2 = file_get_contents($url2.$access_token);
    $data2 = json_decode($json2,true);


    $friends=$data2;

     print 'Friends On WebRTC Trial : ';
     print '<br>';
     foreach($friends['data'] as $key=>$value)
     {
            print $value['name'];
            print '<br>';
     }


   


?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Trial</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<a href="http://webrtc-fypgroup11.rhcloud.com/try.html">FOR SESSION</a>
</head> 
<body> 