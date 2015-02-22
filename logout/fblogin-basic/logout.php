<?php
setcookie('fbs_'.$helper->getAppId(), '', time()-100, '/', 'webrtc-fypgroup11.rhcloud.com');
unset($_SESSION['fb_token']);
session_destroy();
// header('Location: http://www.google.com');

?>
