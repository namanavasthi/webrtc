<?php

        // $email;$comment;$captcha;

        $fname;$lname;$gender;$country;$username;$emailid;$captcha;

        if(isset($_POST['emailid'])){
          $email=$_POST['emailid'];
        }if(isset($_POST['fname'])){
          $fname=$_POST['fname'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf4QQITAAAAAACcjNB3DDMQudNEYmKsm_FcqSlG&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
          echo '<h2>Thanks for posting comment.</h2>';
        }
?>