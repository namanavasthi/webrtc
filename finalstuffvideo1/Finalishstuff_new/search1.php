<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/searchnormalize.css" />
		<link rel="stylesheet" type="text/css" href="css/searchdemo.css" />
		<link rel="stylesheet" type="text/css" href="css/searchcomponent.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
		<?php
			//database connection
			mysql_connect("localhost","root","");
			mysql_select_db("webrtc");
			
			$username= $_COOKIE['userdata']['email'];
			$sendername= $_COOKIE['userdata']['name'];
			$friendname= $_REQUEST['name'];
			$friendemailid= $_REQUEST['email'];
		
		
			if($friendemailid==$username)
				{
					echo"<h2><font color='blue'>You cannot add yourself! </h2>";
				}
				
			else 
			{	
				$query=mysql_query("SELECT * FROM `users` WHERE `fullname` NOT IN (SELECT `friendname` FROM `friends` WHERE `userid`='$username')");
				
				WHILE ($rows=mysql_fetch_array($query)):
				
				if($friendname!=$rows['fullname']){
					$query = mysql_query("INSERT INTO friend_request (username,friendname) VALUES('$username','$friendemailid')");
					$query1= mysql_query("INSERT INTO notifications (username,missedcall,friendrequest,friendrequestemailid,viewstatus) VALUES('$friendemailid','','$sendername','$username','unseen')");
					echo"<h2><font color='blue'>Success! Your friend request has been sent to $friendname! </h2>";
				}
				else {}
				endwhile;
				
			}	
			
			
		?>
			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form" action="presearchresults.php">
					<input class="morphsearch-input" type="search" name='sval' placeholder="Search..."> 
					<!--<input class="morphsearch-input" type="search"></button>-->
					<button class="morphsearch-submit" type="submit">Search</button>
				</form>
			
				<!--<div class="morphsearch-content">
					 <div class="dummy-column">

					</div> 
					
				</div><!-- /morphsearch-content --> 
				<span class="morphsearch-close"></span>
			</div><!-- /morphsearch -->
			
			<div class="overlay"></div>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script>
			(function() {
				var morphSearch = document.getElementById( 'morphsearch' ),
					input = morphSearch.querySelector( 'input.morphsearch-input' ),
					ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
					isOpen = isAnimating = false,
					// show/hide search area
					toggleSearch = function(evt) {
						// return if open and the input gets focused
						if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

						var offsets = morphsearch.getBoundingClientRect();
						if( isOpen ) {
							classie.remove( morphSearch, 'open' );

							// trick to hide input text once the search overlay closes 
							// todo: hardcoded times, should be done after transition ends
							if( input.value !== '' ) {
								setTimeout(function() {
									classie.add( morphSearch, 'hideInput' );
									setTimeout(function() {
										classie.remove( morphSearch, 'hideInput' );
										input.value = '';
									}, 300 );
								}, 500);
							}
							
							input.blur();
						}
						else {
							classie.add( morphSearch, 'open' );
						}
						isOpen = !isOpen;
					};

				// events
				input.addEventListener( 'focus', toggleSearch );
				ctrlClose.addEventListener( 'click', toggleSearch );
				// esc key closes search overlay
				// keyboard navigation events
				document.addEventListener( 'keydown', function( ev ) {
					var keyCode = ev.keyCode || ev.which;
					if( keyCode === 27 && isOpen ) {
						toggleSearch(ev);
					}
				} );


				/***** for demo purposes only: don't allow to submit the form *****/
				//morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			})();
		</script>
	</body>
</html>