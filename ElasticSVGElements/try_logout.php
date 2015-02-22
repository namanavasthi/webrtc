<?php

session_start();

require_once 'libs/facebook-php-sdk-v4-4.0-dev/autoload.php';

$logoutUrl = $facebook->getLogoutURL();
	echo "<a href='$logoutUrl'>LOG OUT BITCH </a>";

?>