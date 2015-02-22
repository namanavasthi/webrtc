<?php

unset($_SESSION['fb_token']);
session_destroy();
header('Location: http://www.google.com');

?>
