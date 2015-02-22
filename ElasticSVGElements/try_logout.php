<?php

session_start();

include 'libs/facebook-php-sdk-v4-4.0-dev/autoload.php';

echo "success";

// $facebook->destroySession();
// $logout = $facebook->getLogoutUrl();
// $facebook->setAccessToken('');


$logoutUrl = $facebook->getLogoutURL();
	echo "<a href='$logoutUrl'>LOG OUT BITCH </a>";

?>

<html>
<head>
	<title>logout_try</title>
</head>
</html>