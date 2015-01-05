<?php
include("usercookie.php");

?>


<html> <!-- xmlns:fb="https://www.facebook.com/2008/fbml"> -->
  <head> 
    <title> 
      AFTER LOGIN
    </title> 
  </head> 

  <body>
    <?php
      // header('refresh:2; url=http://webrtc-fypgroup11.rhcloud.com/afterlogin.php');
      $b=1;
      $connect = mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");

        if (!$connect) {
        die("Connection failed: " .mysql_error());
        } 
        echo 'Connected successfully muhahaha';

        //connect to the datatbase
        mysql_select_db("webrtc");
      do
      {
        print "im in do while now";
        // $query = "INSERT INTO users (firstname,lastname,emailid,hashemail,username) VALUES('$fname','$lname','$em','$a','$uname')";

        // $result = mysql_query($query);

        //query the database
        $query = mysql_query("SELECT * FROM users WHERE firstname=='Archna'");

        $rows = mysql_fetch_array($query);
        echo "yooo".$rows."";
        if($query!='')
          $b=0;
        sleep(5);

        

      }while($b>0);
      print"outside while";



    ?>
<a href="http://webrtc-fypgroup11.rhcloud.com/multichat.php">for multi chat</a>
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

<!-- <a href="http://webrtc-fypgroup11.rhcloud.com/try.html">FOR SESSION</a> -->
</head> 
<body> 