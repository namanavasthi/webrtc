<?php
$next = 'http://webrtc-fypgroup11.rhcloud.com/logout/fblogin-basic/?&logout=true';
$link = $helper->getLogoutUrl($sess,$next);
echo '<a href="'.$link.'" ><button>Logout from facebook</button></a>';

// header('Location: http://www.google.com');

?>
