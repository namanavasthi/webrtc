<?php
require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');

use Facebook\FacebookRedirectLoginHelper;

$redirect_url='http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/';
$helper = new FacebookRedirectLoginHelper($redirect_url);
$sess = $helper->getSessionFromRedirect();
echo "this is sess :";
echo $sess;




$next = 'http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/?&logout=true';
$link = $helper->getLogoutUrl($sess,$next);
echo '<a href="'.$link.'" ><button>Logout from facebook</button></a>';

// header('Location: http://www.google.com');

?>
