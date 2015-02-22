<html>
<head>
	<title>trial</title>
</head>
<body>

<?php

include 'facebook-php-sdk-v4/autoload.php';

echo "after include statement";

$facebook = new Facebook(array(
		'appId' => '955536087794562',
		'secret' => 'd5a0d6381787072586f2f6849183f51d',
		'cookie' => true
	));

// $facebook = new FacebookRedirectLoginHelper('http://webrtc-fypgroup11.rhcloud.com/logout/index.php');

echo "after defining the $facebook value";

$session = $facebook->getSession();
$me=null;

echo "basic ini over";

if($session){
	try{
		$me = $facebook->api('/me');
		echo "success";

	}
	catch(FacebookApiException $e){
		echo $e->getMessage();
	}
}

if($me){
	echo "y u no display logout link";
	$logoutUrl = $facebook->getLogoutUrl();
	echo "<a href='$logoutUrl'>Logout</a>";
}
else{
	echo "y u no display login link";
	$loginUrl = $facebook->getLoginUrl();
	echo "<a href='$loginUrl'>Log In</a>";
}


?>

</body>
</html>