
<?php
/*if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            $check; 
    }
}
*/
// $name=array();
// $i=0;
// if (!empty($_POST))
// {
// 	foreach($_POST['check_list'] as $x => $x_value) 
// 	{
// 		$name[$i]=$x;
// 		$i++;
// 	}
// }

// else
// {
// 	foreach($_GET['check_list'] as $x => $x_value) 
// 	{
// 		$name[$i]=$x;
// 		$i++;
// 	}

// }


$name=array();
$i=0;
if (!empty($_POST))
{
    foreach($_POST['check_list'] as $x => $x_value)
    {
        $name[$i]=$x;
        $i++;
    }
}

else if(!empty($_GET))
{
    foreach($_GET['check_list'] as $x => $x_value)
    {
        $name[$i]=$x;
        $i++;
    }

}


$expire=time()+60*60*24;
setcookie('count',sizeof($name),$expire);

//$expire=time()+60*60*24;
//setcookie('userdata[name]',$data1['first_name'],$expire,'','','',TRUE);

$json = json_encode($name);
setcookie('friends', $json);

//var_dump($name);

?>


<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MULTICHAT</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/homepagenormalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagedemo.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagesidebar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent2_maincontent.css" />

		<link rel="stylesheet" type="text/css" href="css/homepagedemo_rightbar.css" />
		<link rel="stylesheet" type="text/css" href="css/homepagecomponent_rightbar.css" />
		<link href="css/bootstrap.css" rel="stylesheet">
        <link rel="webrtc icon" href="images/webrtc_ico.ico"/>

<style>
      div.container-fluid{
        /*margin: 0;*/
        background: url(http://img854.imageshack.us/img854/303/jlf5w.jpg);
    background-size: cover;
    background-repeat:no-repeat;
        /*background-size: 1440px 800px;*/
        /*background-repeat:no-repeat;*/
        /*display: compact;*/
      }
    </style>

		<script src="js/snap.svg-min.js"></script>


<!-- bootstrap scripts -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- end of bootstrap scripts -->



        <!-- scripts used for video-conferencing -->
        <script src="firebase.js"> </script>
        <script src="RTCPeerConnection-v1.5.js"> </script>
        <script src="conference.js"> </script>
        
        <!-- script used to stylize video element -->
        <script src="getMediaElement.min.js"> </script>


<style>
            .badge-notify{
               background:red;
               position:relative;
               top: -15px;
               /*left: -35px;*/
            }

        </style>

<style>
  .navbar-brand img{
    width: 45px;
    height: 35px;
    margin-top: -7px;
    float: left;
    margin-right: 3px;
  }
</style>



		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	
















	<body>

<div class="container-fluid" style="height:720px">


<!-- navbar header -->

	<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse navbar-static-top">
      
        <div class="navbar-header">
        <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="navbar-brand" href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/index.php"><img src="images/webrtc.png">Vid3Com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/homepage.php">Home</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/aboutus/aboutus.html" target="ext">About</a></li>
            <li><a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/contactus.php">Contact</a></li>
            <li>
                <!-- <div class="container"> -->
                <a href="http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/notifications.php">
                    <!-- <button class="btn btn-default btn-lg btn-link" style="font-size:36px;"> -->
                        <span class="glyphicon glyphicon-comment"></span>
                        Notification
                    <!-- </button> -->
                    <!-- <span class="badge badge-notify"> -->
                        <?php 
                            mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
                            mysql_select_db("webrtc");
                            $name=$_COOKIE['userdata']['email'];
                            //$name='emma@gmail.com';
                            $query = mysql_query("SELECT * FROM notifications WHERE username='$name' AND viewstatus<>'seen'");
                            $count=mysql_num_rows($query);
                            if ($count!=0) {
                                    echo "<span class='badge badge-notify'>$count</span>";
                                }
                        ?>
                    <!-- </span> -->
                <!-- </div> -->
                </a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
                $cookie_name="logoutlink1";
                if(!isset($_COOKIE[$cookie_name])) {
                    echo "<li><a href='http://webrtc-fypgroup11.rhcloud.com/finalstuffvideo1/Finalishstuff/' alt='Logout'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>Logout&nbsp;&nbsp;</a></li>";
                } else {
                    $link=$_COOKIE[$cookie_name];
                }
                echo "<li><a href='".$link."' alt='Logout from Facebook'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>Logout&nbsp;&nbsp;</a></li>";
            ?>
            </ul>
        </div>

    </div>
  </div><!-- /container -->
</div><!-- /navbar wrapper -->

<!-- end of navbar -->


	<!-- this is for left sidebar -->
		<div class="container">
			<nav id="menu" class="menu">
				<button class="menu__handle"><span>Menu</span></button>
				<div class="menu__inner">
					<ul>
						<li><a href="#"><i class="fa fa-fw fa-home"></i><span>Home<span></a></li>
						<li><a href="#"><i class="fa fa-fw fa-heart"></i><span>Favs<span></a></li>
						<li><a href="#"><i class="fa fa-fw fa-folder"></i><span>Files<span></a></li>
						<li><a href="#"><i class="fa fa-fw fa-tachometer"></i><span>Stats<span></a></li>
					</ul>
				</div>
				<div class="morph-shape" data-morph-open="M300-10c0,0,295,164,295,410c0,232-295,410-295,410" data-morph-close="M300-10C300-10,5,154,5,400c0,232,295,410,295,410">
					<svg width="100%" height="100%" viewBox="0 0 600 800" preserveAspectRatio="none">
						<path fill="none" d="M300-10c0,0,0,164,0,410c0,232,0,410,0,410"/>
					</svg>
				</div>
			</nav>
			<div class="main">
				</div><!-- /main -->
		</div><!-- /container -->


		<div class="container">
			<div class="side-fluid">
				<div class="intro-content">				
			<!--	
					echo"<div class='profile'> <img src='php/imageoffriend?imagename=$lala'></div>";
					
					?> -->

					
	
					<!-- ADDDDDEDDDDDDDDDDD PARTTTTTTTTT COOOOOOOOKKKIIIIEEEEEEEEEEE-->
					
				
					<!-- ADDED PART!!!!!!!!!!!!!!!!!!!!!!!!!!! king.php-->

				<h3>
                <font color='blue'>
                <?php
                    $num=sizeof($name);
                    if($num==1)
                    {
                        echo "<p>$num</p><br>";
                        echo "You haven't selected any participants<br><br>";
                        echo"<a href='multichat.php' target='_parent'>Click to select participants </a>";
                    }
                    else if($num>5)
                    {
                        echo"
                
                        <p>$num</p><br>
                        Please select only 4 participants<br><br>";
                        echo"<a href='multichat.php' target='_parent'>Click to select participants </a>";
                    }
                    
                    else {
                    // echo"FRIENDS SELECTED ARE: <br>";
                    // for($i=0;$i<sizeof($name);$i++)
                    // {
                    //     echo $name[$i]."<br>";
                    // }
                
                
                        echo"
                        
                        </font>
                        </h3>";
                        
                        
                        echo"
                          <h1>  <span>
                                <p>$num</p><br>
                                <a href='multiindex.php' target='_parent'><code>
                                <strong id='unique-token'>$num Proceed to Video Call</strong></code></a>
                            </span> </h1>
                            
                         
                         ";
            
                    }
                ?>
            <script>
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
        document.getElementById('unique-token').onclick = function () {
        //location.href = "videocall.php";
    }

    }




}


            </script>
        
            </div>
            </div>
        </div><!-- /container -->


<!-- ADDDDDEEEEEDDDDDDDDDD FROM initial.html -->

<script>
              
                var config = {
                    openSocket: function(config) {
                        var channel = config.channel || location.href.replace( /\/|:|#|%|\.|\[|\]/g , '');
                        var socket = new Firebase('https://webrtc.firebaseIO.com/' + channel);
                        socket.channel = channel;
                        socket.on("child_added", function(data) {
                            config.onmessage && config.onmessage(data.val());
                        });
                        socket.send = function(data) {
                            this.push(data);
                        };
                        config.onopen && setTimeout(config.onopen, 1);
                        socket.onDisconnect().remove();
                        return socket;
                    },
                    onRemoteStream: function(media) {
                        var mediaElement = getMediaElement(media.video, {
                            width: (videosContainer.clientWidth / 2) - 50,
                            buttons: ['mute-audio', 'mute-video', 'full-screen', 'volume-slider','take-snapshot']
                        });
                        mediaElement.id = media.streamid;
                        videosContainer.insertBefore(mediaElement, videosContainer.firstChild);
                    },
                    onRemoteStreamEnded: function(stream, video) {
                        if (video.parentNode && video.parentNode.parentNode && video.parentNode.parentNode.parentNode) {
                            video.parentNode.parentNode.parentNode.removeChild(video.parentNode.parentNode);
                        }
                    },
                    onRoomFound: function(room) {
                        var alreadyExist = document.querySelector('button[data-broadcaster="' + room.broadcaster + '"]');
                        if (alreadyExist) return;

                        if (typeof roomsList === 'undefined') roomsList = document.body;

                        var tr = document.createElement('tr');
                        tr.innerHTML = '<td><strong>' + room.roomName + '</strong> shared a conferencing room with you!</td>' +
                            '<td><button class="join">Join</button></td>';
                        roomsList.insertBefore(tr, roomsList.firstChild);

                        var joinRoomButton = tr.querySelector('.join');
                        joinRoomButton.setAttribute('data-broadcaster', room.broadcaster);
                        joinRoomButton.setAttribute('data-roomToken', room.roomToken);
                        joinRoomButton.onclick = function() {
                            this.disabled = true;

                            var broadcaster = this.getAttribute('data-broadcaster');
                            var roomToken = this.getAttribute('data-roomToken');
                            captureUserMedia(function() {
                                conferenceUI.joinRoom({
                                    roomToken: roomToken,
                                    joinUser: broadcaster
                                });
                            }, function() {
                                joinRoomButton.disabled = false;
                            });
                        };
                    },
                    onRoomClosed: function(room) {
                        var joinButton = document.querySelector('button[data-roomToken="' + room.roomToken + '"]');
                        if (joinButton) {
                            // joinButton.parentNode === <li>
                            // joinButton.parentNode.parentNode === <td>
                            // joinButton.parentNode.parentNode.parentNode === <tr>
                            // joinButton.parentNode.parentNode.parentNode.parentNode === <table>
                            joinButton.parentNode.parentNode.parentNode.parentNode.removeChild(joinButton.parentNode.parentNode.parentNode);
                        }
                    }
                };

                function setupNewRoomButtonClickHandler() {
                    btnSetupNewRoom.disabled = true;
                    document.getElementById('conference-name').disabled = true;
                    captureUserMedia(function() {
                        conferenceUI.createRoom({
                            roomName: (document.getElementById('conference-name') || { }).value || 'Anonymous'
                        });
                    }, function() {
                        btnSetupNewRoom.disabled = document.getElementById('conference-name').disabled = false;
                    });
                }

                function captureUserMedia(callback, failure_callback) {
                    var video = document.createElement('video');

                    getUserMedia({
                        video: video,
                        onsuccess: function(stream) {
                            config.attachStream = stream;
                            callback && callback();

                            video.setAttribute('muted', true);
                            
                            var mediaElement = getMediaElement(video, {
                                width: (videosContainer.clientWidth / 2) - 50,
                                buttons: ['mute-audio', 'mute-video', 'full-screen', 'volume-slider','take-snapshot']
                            });
                            mediaElement.toggle('mute-audio');
                            videosContainer.insertBefore(mediaElement, videosContainer.firstChild);
                        },
                        onerror: function() {
                            alert('unable to get access to your webcam');
                            callback && callback();
                        }
                    });
                }

                var conferenceUI = conference(config);

                /* UI specific */
                var videosContainer = document.getElementById('videos-container') || document.body;
                var btnSetupNewRoom = document.getElementById('setup-new-room');
                var roomsList = document.getElementById('rooms-list');

                if (btnSetupNewRoom) btnSetupNewRoom.onclick = setupNewRoomButtonClickHandler;

                function rotateVideo(video) {
                    video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
                    setTimeout(function() {
                        video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
                    }, 1000);
                }

                (function() {
                    var KEY=(Math.random() * new Date().getTime()).toString(36).toUpperCase().replace( /\./g , '-');
                    var uniqueToken = document.getElementById('unique-token');
                    if (uniqueToken)
                        if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_parent">Share this link</a></h2>';
                        else uniqueToken.parentNode.parentNode.href = 'multiindex.php#' + KEY;
                        var cookie_name='multicookiee';
                        var days='7';
                        myFunction3(cookie_name,KEY,days);
                })();

                function scaleVideos() {
                    var videos = document.querySelectorAll('video'),
                        length = videos.length, video;

                    var minus = 130;
                    var windowHeight = 700;
                    var windowWidth = 600;
                    var windowAspectRatio = windowWidth / windowHeight;
                    var videoAspectRatio = 4 / 3;
                    var blockAspectRatio;
                    var tempVideoWidth = 0;
                    var maxVideoWidth = 0;

                    for (var i = length; i > 0; i--) {
                        blockAspectRatio = i * videoAspectRatio / Math.ceil(length / i);
                        if (blockAspectRatio <= windowAspectRatio) {
                            tempVideoWidth = videoAspectRatio * windowHeight / Math.ceil(length / i);
                        } else {
                            tempVideoWidth = windowWidth / i;
                        }
                        if (tempVideoWidth > maxVideoWidth)
                            maxVideoWidth = tempVideoWidth;
                    }
                    for (var i = 0; i < length; i++) {
                        video = videos[i];
                        if (video)
                            video.width = maxVideoWidth - minus;
                    }
                }

                window.onresize = scaleVideos;

            </script>
            
            







<!--TILL HERE!!!!!!!!!!!!!!!!!!!! -->






















        <script src="js/classie.js"></script>
        <script>
            (function() {

                function SVGMenu( el, options ) {
                    this.el = el;
                    this.init();
                }

                SVGMenu.prototype.init = function() {
                    this.trigger = this.el.querySelector( 'button.menu__handle' );
                    this.shapeEl = this.el.querySelector( 'div.morph-shape' );

                    var s = Snap( this.shapeEl.querySelector( 'svg' ) );
                    this.pathEl = s.select( 'path' );
                    this.paths = {
                        reset : this.pathEl.attr( 'd' ),
                        open : this.shapeEl.getAttribute( 'data-morph-open' ),
                        close : this.shapeEl.getAttribute( 'data-morph-close' )
                    };

                    this.isOpen = false;

                    this.initEvents();
                };

                SVGMenu.prototype.initEvents = function() {
                    this.trigger.addEventListener( 'click', this.toggle.bind(this) );
                };

                SVGMenu.prototype.toggle = function() {
                    var self = this;

                    if( this.isOpen ) {
                        classie.remove( self.el, 'menu--anim' );
                        setTimeout( function() { classie.remove( self.el, 'menu--open' );   }, 250 );
                    }
                    else {
                        classie.add( self.el, 'menu--anim' );
                        setTimeout( function() { classie.add( self.el, 'menu--open' );  }, 250 );
                    }
                    this.pathEl.stop().animate( { 'path' : this.isOpen ? this.paths.close : this.paths.open }, 350, mina.easeout, function() {
                        self.pathEl.stop().animate( { 'path' : self.paths.reset }, 800, mina.elastic );
                    } );
                    
                    this.isOpen = !this.isOpen;
                };

                new SVGMenu( document.getElementById( 'menu' ) );

            })();
        </script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


    </body>
</html>