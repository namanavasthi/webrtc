﻿<!--ADDDDDDDDDEEEEEEEEEEEEDDDDDDDDDD to restrict users -->

<?php
    mysql_connect("127.0.0.1","root","");
    mysql_select_db("webrtc");
   
   
    if(empty($_COOKIE))
    {
        echo"
        <script>
        alert('Unauthorized user!!');
        //window.location.href('index.php');    //ERRRORRRRRRRR PAGE!!
        </script>
        ";
        header('Location:404.html'); //ADDDDDDDDDD URLLLLL
    }
    $name=$_COOKIE['userdata']['name'];
    $sender=$_COOKIE['sender'];
    //echo "a ".$sender." i";
   


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>WebRTC</title>
        
        <link rel="webrtc icon" href="images/webrtc_ico.ico"/>
        
        <link rel="stylesheet" href="style.css">
        
        <style>
            audio, video {
                -moz-transition: all 1s ease;
                -ms-transition: all 1s ease;
                
                -o-transition: all 1s ease;
                -webkit-transition: all 1s ease;
                transition: all 1s ease;
                vertical-align: top;
            }

            input {
                border: 1px solid #d9d9d9;
                border-radius: 1px;
                font-size: 2em;
                margin: .2em;
                width: 30%;
            }

            .setup {
                border-bottom-left-radius: 0;
                border-top-left-radius: 0;
                font-size: 102%;
                height: 47px;
                margin-left: -9px;
                margin-top: 8px;
                position: absolute;
            }

            p { padding: 1em; }

            li {
                border-bottom: 1px solid rgb(189, 189, 189);
                border-left: 1px solid rgb(189, 189, 189);
                padding: .5em;
            }
        </style>
        <script>
            document.createElement('article');
            document.createElement('footer');
        </script>
        
        <!-- scripts used for video-conferencing -->
        <script src="firebase.js"> </script>
        <script src="RTCPeerConnection-v1.5.js"> </script>
        <script src="conference.js"> </script>
        
        <!-- script used to stylize video element -->
        <script src="getMediaElement.min.js"> </script>
    </head>






<!-- ADDDDDDDEEEEEEEEEEEEEDDDDDDDDDDDD QUERY DB!!!!!!!!!! -->

<div id="auto"></div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.9.0.min.js"></script>
<script src="https://code.jquery.com/jquery-1.3.2.min.js"></script>
<script>
$(document).ready(function()
{
    $('#auto').load('status.php');
    refresh();
}
    );
   
function refresh()
{
    setTimeout(function() {
    $('#auto').load('status.php');
    refresh();
    },5000);
}


</script>


<!--till here!!!!!!!!! -->










    

	<!--ADDDDDDDDDDDDEEEEEEEEEEEEDDDDDDDDDDD FOR STATUS PART!!!! -->
	
	<?php
		mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
		mysql_select_db("webrtc");
		$hashem=$_COOKIE['userdata']['email'];
		$hashem=hash("md5",$hashem);
		$query=mysql_query("UPDATE users SET status='Busy' WHERE hashemail='$hashem'");
	?>
	
	
	
	
	
	<!--ADDDDDDDDDDDDEEEEEEEEEEEEDDDDDDDDDDD FOR DB PART!!!! -->
	
	<?php 
							
							if($_COOKIE['friendname']=='NULL' or $_COOKIE['friendname']=='')
							{
								
							}
							else	{
								mysql_connect("127.2.139.130","adminPfy2zVu","BXXbBfmR7fWS");
								mysql_select_db("webrtc");

								
								$a=$_COOKIE['userdata']['email'];
								//echo $name;
								$a=hash("md5",$a);
								$fn=$_COOKIE['friendname'];
								//UPDATE `friends` SET `friendid`=[value-1],`userid`=[value-2],`friendname`=[value-3],`webrtcid`=[value-4] WHERE 1
								// CHECK HERE!!!!
						
								//$pageURL='localhost/myfiles/webrtc/ElasticSVGElements/webrtc chat thing comule/videocall.php';
								//$pageURL=$pageURL.'#'.$_COOKIE['cookiee'];
								$pageURL=$_COOKIE['cookiee'];
								//$query = mysql_query("UPDATE friends SET webrtcid='$pageURL' WHERE userid='$a' AND friendname='$fn'");
								$query = mysql_query("UPDATE friends SET webrtcid='$pageURL',type='video' WHERE userid='$a' AND friendname='$fn'");
								unset($_COOKIE['cookiee']);
							
							}
							
							?>
	
	
	
	<!-- TILL HERE!!!!!!!!!! -->
	
	
	
	
	
	
	
	
	
	
	
    <body>
        <article>
            <!--<header style="text-align: center;">
                <h1>
                    <a href="https://www.webrtc-experiment.com/">WebRTC</a> 
                    » 
                    <a href="https://github.com/muaz-khan/WebRTC-Experiment/tree/master/video-conferencing" target="_blank">video-conferencing</a>
                    ® 
                    <a href="https://github.com/muaz-khan" target="_blank">Muaz Khan</a>
                </h1>            
                <p>
                    <a href="https://www.webrtc-experiment.com/">HOME</a>
                    <span> &copy; </span>
                    <a href="http://www.MuazKhan.com/" target="_blank">Muaz Khan</a>
                    
                    .
                    <a href="http://twitter.com/WebRTCWeb" target="_blank" title="Twitter profile for WebRTC Experiments">@WebRTCWeb</a>
                    
                    .
                    <a href="https://github.com/muaz-khan?tab=repositories" target="_blank" title="Github Profile">Github</a>
                    
                    .
                    <a href="https://github.com/muaz-khan/WebRTC-Experiment/issues?state=open" target="_blank">Latest issues</a>
                    
                    .
                    <a href="https://github.com/muaz-khan/WebRTC-Experiment/commits/master" target="_blank">What's New?</a>
                </p>
            </header>-->

            <!--<div class="github-stargazers"></div>-->
        
            <!-- just copy this <section> and next script -->
            <section class="experiment">                
                <section>
                    <span>
                        <a href="/video-conferencing/" target="_blank" title="Open this link in new tab. Then your conference room will be private!"><code><strong id="unique-token">Click Me</strong></code></a>
                    </span>
                    
                    <input type="text" id="conference-name">           <!--add text here if at all it is needed -->
                    <button id="setup-new-room" class="setup">Setup New Conference</button>
					<br><br><br>
					<button id="close" class="setup">Close Conference</button>
                    <script type="text/javascript">
                        document.getElementById("close").onclick = function () {
							//var key=getCookie('multicookiee');
							var key=window.location.hash.substring(1);
							var callstatus='accepted';
                            window.location.href = "homepage.php?callstatus="+callstatus+"&caller="+key;
                        };
                    </script>
						
                </section>
                
                <!-- list of all available conferencing rooms -->
                <table style="width: 100%;" id="rooms-list"></table>
                
                <!-- local/remote videos container -->
                <div id="videos-container"></div>
            </section>
        
            <script>
                // Muaz Khan     - https://github.com/muaz-khan
                // MIT License   - https://www.webrtc-experiment.com/licence/
                // Documentation - https://github.com/muaz-khan/WebRTC-Experiment/tree/master/video-conferencing

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
                        tr.innerHTML = '<td>ABC called u</td>' +
                            '<td><button class="join">Join</button></td>';
                        // tr.innerHTML = '<td><strong>' + room.roomName + '</strong> shared a conferencing room with you!</td>' +
                        //     '<td><button class="join">Join</button></td>';
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
                    var uniqueToken = document.getElementById('unique-token');
                    if (uniqueToken)
                        if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank"></a></h2>';
                        else uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace( /\./g , '-');
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
            
            
        </article>
        
        
    
        <!-- commits.js is useless for you! -->
        <!-- <script src="//cdn.webrtc-experiment.com/commits.js" async> </script>-->
    </body>
</html>
