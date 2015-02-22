<?php
$cookie_name="logoutlink";
if(!isset($_COOKIE[$cookie_name])) {
    //not possible
} else {
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    $link=$_COOKIE[$cookie_value];
}

echo '<a href="'.$link.'" ><button>Logout from facebook</button></a>';

// header('Location: http://www.google.com');

?>
