<?php

session_start();

// include 'libs/facebook-php-sdk-v4-4.0-dev/autoload.php';
define('FACEBOOK_SDK_V4_SRC_DIR', '/libs/facebook-php-sdk-v4-4.0-dev/src/Facebook/');
require __DIR__ . '/libs/facebook-php-sdk-v4-4.0-dev/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

echo "success";

// $facebook->destroySession();
// $logout = $facebook->getLogoutUrl();
// $facebook->setAccessToken('');


$logoutUrl = $helper->getLogoutURL();
echo "<a href='$logoutUrl'>LOG OUT BITCH </a>";

?>

<html>
<head>
	<title>logout_try</title>
</head>
</html>