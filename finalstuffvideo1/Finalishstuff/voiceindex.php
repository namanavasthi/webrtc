﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <link rel="stylesheet" href="voicestyle.css">
        
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
        <script src="voicefirebase.js"> </script>
        <script src="voiceRTCPeerConnection-v1.5.js"> </script>
        <script src="voiceconference.js"> </script>
        
        <!-- script used to stylize video element -->
        <script src="voicecall.js"> </script>
	</head>	
		<!--ADDDDDDDDDDDDEEEEEEEEEEEEDDDDDDDDDDD FOR STATUS PART!!!! -->
	
	<?php
		mysql_connect("127.0.0.1","root","");
		mysql_select_db("webrtc");
		$hashem=$_COOKIE['userdata']['email'];
		$hashem=hash("md5",$hashem);
		$query=mysql_query("UPDATE users SET status='Busy' WHERE hashemail='$hashem'");
	?>
	
	
	
	
	
	<!--ADDDDDDDDDDDDEEEEEEEEEEEEDDDDDDDDDDD FOR DB PART!!!! -->
	
	<?php 
						mysql_connect("127.0.0.1","root","");
						mysql_select_db("webrtc");
					
							if($_COOKIE['friendname']=='NULL' or $_COOKIE['friendname']=='')
							{
								
							}
				
							
							else	{
								
								$a=$_COOKIE['userdata']['email'];
								//echo $name;
								$a=hash("md5",$a);
								$fn=$_COOKIE['friendname'];
								//UPDATE `friends` SET `friendid`=[value-1],`userid`=[value-2],`friendname`=[value-3],`webrtcid`=[value-4] WHERE 1
								// CHECK HERE!!!!
						
								//$pageURL='localhost/myfiles/webrtc/ElasticSVGElements/webrtc chat thing comule/videocall.php';
								//$pageURL=$pageURL.'#'.$_COOKIE['cookiee'];
								$pageURL=$_COOKIE['voicecookiee'];
								//$query = mysql_query("UPDATE friends SET webrtcid='$pageURL' WHERE userid='$a' AND friendname='$fn'");
								$query = mysql_query("UPDATE friends SET webrtcid='$pageURL',type='audio' WHERE userid='$a' AND friendname='$fn'");
								unset($_COOKIE['voicecookiee']);
							
							}
							
							?>
	
	
	
	<!-- TILL HERE!!!!!!!!!! -->
	
	
	
	
	
    

    <body>
        <article>
           
            <!-- just copy this <section> and next script -->
            <section class="experiment">                
                <section>
                    <span>
                        Private ?? <a href="/video-conferencing/" target="_blank" title="Open this link in new tab. Then your conference room will be private!"><code><strong id="unique-token">#123456789</strong></code></a>
                    </span>
                    
                    <input type="text" id="conference-name"> 
                    <button id="setup-new-room" class="setup">Setup New Conference</button>
                </section>
                
                <!-- list of all available conferencing rooms -->
                <table style="width: 100%;" id="rooms-list"></table>
                
                <!-- local/remote videos container -->
                <div id="videos-container"></div>
            </section>
        
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
                            buttons: ['mute-audio', 'full-screen', 'volume-slider']
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
                        tr.innerHTML = '<td><strong>'  + '</strong> </td>' +  
                            '<td><button class="join">Join</button></td>'; //CHHHHHAAAAAAAAAAANNNNGEEEEEEEEEEEE
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
                                buttons: ['mute-audio', 'full-screen', 'volume-slider']
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
            
            <!--<section class="experiment">
                <ol>
                    <li>This <a href="https://www.webrtc-experiment.com/">WebRTC</a> experiment is aimed to transmit audio/video streams in many-to-many style.</li>
                    <li>It setups multiple peer connections to support multi-user connectivity feature. Remember, <a href="https://www.webrtc-experiment.com/">WebRTC</a> doesn't supports 3-way handshake!</li>
                    <li>Out of multi-peers establishment; many RTP-ports are opened according to number of media streams referenced to each peer connection.</li>
                    <li>Multi-ports establishment will cause <a href="https://www.webrtc-experiment.com/docs/RTP-usage.html">huge CPU and bandwidth usage</a>!</li>
                    <li>Mesh networking model is implemented to open multiple interconnected peer connections.</li>
                    <li>Maximum peer connections limit is 256 (on chrome). It means that 256 users can be interconnected!</li>
                </ol>
            </section>
        
            <section class="experiment">
                <h2 class="header">Want to use video-conferencing in your own webpage?</h2>
                <pre>
&lt;script src="//cdn.webrtc-experiment.com/socket.io.js"&gt; &lt;/script&gt;
&lt;script src="//cdn.webrtc-experiment.com/RTCPeerConnection-v1.5.js"&gt; &lt;/script&gt;
&lt;script src="//cdn.webrtc-experiment.com/video-conferencing/conference.js"&gt; &lt;/script&gt;

&lt;button id="setup-new-room"&gt;Setup New Conference&lt;/button&gt;
&lt;table style="width: 100%;" id="rooms-list"&gt;&lt;/table&gt;
&lt;div id="videos-container"&gt;&lt;/div&gt;

&lt;script&gt;
var config = {
    openSocket: function (config) {
        var SIGNALING_SERVER = 'https://webrtc-signaling.nodejitsu.com:443/',
            defaultChannel = location.href.replace(/\/|:|#|%|\.|\[|\]/g, '');

        var channel = config.channel || defaultChannel;
        var sender = Math.round(Math.random() * 999999999) + 999999999;

        io.connect(SIGNALING_SERVER).emit('new-channel', {
            channel: channel,
            sender: sender
        });

        var socket = io.connect(SIGNALING_SERVER + channel);
        socket.channel = channel;
        socket.on('connect', function () {
            if (config.callback) config.callback(socket);
        });

        socket.send = function (message) {
            socket.emit('message', {
                sender: sender,
                data: message
            });
        };

        socket.on('message', config.onmessage);
    },
    onRemoteStream: function (media) {
        var video = media.video;
        video.setAttribute('controls', true);
        video.setAttribute('id', media.stream.id);
        videosContainer.insertBefore(video, videosContainer.firstChild);
        video.play();
    },
    onRemoteStreamEnded: function (stream) {
        var video = document.getElementById(stream.id);
        if (video) video.parentNode.removeChild(video);
    },
    onRoomFound: function (room) {
        var alreadyExist = document.querySelector('button[data-broadcaster="' + room.broadcaster + '"]');
        if (alreadyExist) return;

        var tr = document.createElement('tr');
        tr.innerHTML = '&lt;td&gt;&lt;strong&gt;' + room.roomName + '&lt;/strong&gt; shared a conferencing room with you!&lt;/td&gt;' +
            '&lt;td&gt;&lt;button class="join"&gt;Join&lt;/button&gt;&lt;/td&gt;';
        roomsList.insertBefore(tr, roomsList.firstChild);

        var joinRoomButton = tr.querySelector('.join');
        joinRoomButton.setAttribute('data-broadcaster', room.broadcaster);
        joinRoomButton.setAttribute('data-roomToken', room.broadcaster);
        joinRoomButton.onclick = function () {
            this.disabled = true;

            var broadcaster = this.getAttribute('data-broadcaster');
            var roomToken = this.getAttribute('data-roomToken');
            captureUserMedia(function () {
                conferenceUI.joinRoom({
                    roomToken: roomToken,
                    joinUser: broadcaster
                });
            });
        };
    }
};

var conferenceUI = conference(config);
var videosContainer = document.getElementById('videos-container') || document.body;
var roomsList = document.getElementById('rooms-list');

document.getElementById('setup-new-room').onclick = function () {
    this.disabled = true;
    captureUserMedia(function () {
        conferenceUI.createRoom({
            roomName: 'Anonymous'
        });
    });
};

function captureUserMedia(callback) {
    var video = document.createElement('video');
    video.setAttribute('autoplay', true);
    video.setAttribute('controls', true);
    videosContainer.insertBefore(video, videosContainer.firstChild);

    getUserMedia({
        video: video,
        onsuccess: function (stream) {
            config.attachStream = stream;
            video.setAttribute('muted', true);
            callback();
        }
    });
}
&lt;/script&gt;
</pre>
            </section>
            
            <section class="experiment own-widgets latest-commits">
                <h2 class="header" id="updates" style="color: red; padding-bottom: .1em;"><a href="https://github.com/muaz-khan/WebRTC-Experiment/commits/master" target="_blank">Latest Updates</a></h2>
                <div id="github-commits"></div>
            </section>
        
            <section class="experiment">
                <h2 class="header" id="feedback">Feedback</h2>
                <div>
                    <textarea id="message" style="border: 1px solid rgb(189, 189, 189); height: 8em; margin: .2em; outline: none; resize: vertical; width: 98%;" placeholder="Have any message? Suggestions or something went wrong?"></textarea>
                </div>
                <button id="send-message" style="font-size: 1em;">Send Message</button><small style="margin-left: 1em;">Enter your email too; if you want "direct" reply!</small>
            </section>-->
        </article>
        
        <!--<a href="https://github.com/muaz-khan/WebRTC-Experiment/tree/master/video-conferencing" class="fork-left"></a>
        
        <footer>
            <p>
                <a href="https://www.webrtc-experiment.com/">WebRTC Experiments</a>
                © <a href="https://plus.google.com/+MuazKhan" rel="author" target="_blank">Muaz Khan</a>
                <a href="mailto:muazkh@gmail.com" target="_blank">muazkh@gmail.com</a>
            </p>
        </footer>-->
    
        <!-- commits.js is useless for you! -->
        <script src="//cdn.webrtc-experiment.com/commits.js" async> </script>
    </body>
</html>