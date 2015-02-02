<script>
function id () {
return (Math.random() * 10000 + 10000 | 0).toString();
}
ROOM = id();
function myFunction3(name,value,days) {
							
	// naman cookie files index.html

	if (days) {
		var date = new Date();
		//date.setTime(date.getTime()+(days*24*60*60*1000));
		date.setTime(date.getTime()+(days*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	{
		document.cookie = name+"="+value+";"+expires;
		document.getElementById('key').onclick = function () {
        location.href = "videocall.php";
    }

	}




}

var cookie_name='cookiee';
var days='7';





document.write("<div id='key'><a href='#' onClick=myFunction3(cookie_name,ROOM,days)>Send link to other peer</a></div>");
</script>

<?php



?>