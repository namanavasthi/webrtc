<html>
<head>
	<title>trial</title>
</head>
<body>

<?php

include 'facebook-php-sdk-v4-4.0-dev/autoload.php';

$facebook = new Facebook(array(
		'appId' => '955536087794562',
		'secret' => 'd5a0d6381787072586f2f6849183f51d',
		'cookie' => true
	));

$session = $facebook->getSession();
$me=null;

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