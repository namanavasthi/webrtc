<?php
print '<br>';
print_r($_COOKIE);

if(isset($_COOKIE['userdata'])){
	foreach($_COOKIE['userdata'] as $name=>$value){
		$name=htmlspecialchars($name);
		$value=htmlspecialchars($value);
		echo "$name : $value <br />\n";
	}
}

?>