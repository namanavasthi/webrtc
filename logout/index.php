<html>
<head>
	<title>trial</title>
</head>
<body>

<?php

include 'facebook-php-sdk-v4-4.0-dev/autoload.php';

$facebook = new Facebook(array(
		'appId' => '',
		'secret' => '',
		'cookie' => true
	));

$session = $facebook->getSession();
$me=null;

if($session){
	try{
		$me = $facebook->api('/me');

	}
	catch(FacebookApiException $e){
		echo $e->getMessage();
	}
}

if($me){
	$logoutUrl = $facebook->getLogoutUrl();
	echo "<a href='$logoutUrl'>Logout</a>";
}
else{
	$loginUrl = $facebook->getLoginUrl();
	echo "<a href='$loginUrl'>Log In</a>";
}


?>

</body>
</html>