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
			<!--<aside class="sidebar clearfix">
				<nav>
					<a href="#"><i class="fa fa-fw fa-comments-o"></i></a>
					<a href="#"><i class="fa fa-fw fa-heart-o"></i></a>
					<a href="#"><i class="fa fa-fw fa-send-o"></i></a>
					<a href="#"><i class="fa fa-fw fa-smile-o"></i></a>
				</nav>
			</aside> -->
			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form" action="presearchresults.php">
					<input class="morphsearch-input" type="search" name='sval' placeholder="Search..."> 
					<!--<input class="morphsearch-input" type="search"></button>-->
					<button class="morphsearch-submit" type="submit">Search</button>
				</form>
				<div class="morphsearch-content">
					<!-- <div class="dummy-column">
						/* incase we want to display the results on the same page */
					</div> -->
					
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