$('document').ready(function(){
	$('#leftcolumn a').ready(function(){
		var page=$(this).attr('href');
		$('#rightcolumn').load('' + page + '.php');
		$('#rightcolumn').ready(function(){
			var number=5;
			//var url='http://localhost/myfiles/ajaxfiles/load.php';
			function getCookie(cname) {
				var name = cname + "=";
				var ca = document.cookie.split(';');
				for(var i=0; i<ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0)==' ') c = c.substring(1);
						if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
				}
				return "";
			}			
			// function getCookie1(cname) {
			// 	var name = cname + "=";
			// 	var ca = document.cookie.split(';');
			// 	for(var i=0; i<ca.length; i++) {
			// 		var c = ca[i];
			// 		while (c.charAt(0)==' ') c = c.substring(1);
			// 			if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
			// 	}
			// 	return null;
			// }
			function countdown(){
				setTimeout(countdown,1000);
				if(number>=0){
					//$('#rightcolumn').html("redirecting in " + number + " seconds.");
					number--;
				}
			
				if(number<0){
					//window.location= url;
					ajaxpage('load.php', 'rightcolumn');
					number = 5;
					
					
					//var value="100"
					var value=getCookie("flag");
					//document.write(value);

					
					//var key="webrtc-fypgroup11.rhcloud.com/videocall.php";
					// var key=getCookie1("webrtcid");
					var key=getCookie("webrtcid");
					// document.write(key);
				
				
				
				if(value=="1001")	{
						document.cookie = "flag" + "=" + "100" ;
						alert('There are no fields to generate a report');
						window.location.href ="//webrtc-fypgroup11.rhcloud.com/videocall.php"+key;
						//window.open("www.google.com","_self");
					}
				
				
				
				
				
				//function myFunction() {
					//var x;
					//if (confirm("Press a button!") == true) {
						//window.open('www.google.com');
						
					//} 
				//	document.getElementById("demo").innerHTML = x;	
				//}	
				
				/* OLDER PART
					if(value=="1001")	{
						document.cookie = "flag" + "=" + "100" ;
						alert('There are no fields to generate a report');
						location.href="www.google.com";
						//window.open("www.google.com","_self");
					} */
					
					//if(value=="1001")	{
						//myFunction();
					//}
					
					else
					{
						//location.href='https://facebook.com'
					}
					
					
				}
				
				
			
			}
			countdown();
		
		});
		
		
		
		return false;

	});
});