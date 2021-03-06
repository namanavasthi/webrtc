<!DOCTYPE html>
<html>
	<head>
		<title>FINAL YEAR PROJECT</title>

        <script type='text/javascript' src='https://cdn.firebase.com/v0/firebase.js'></script>
        <style>#video,#otherPeer { width: 300px;}</style>
        
		<meta name ="viewport" content = "width=device-width, initial-scale=1.0" >
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
	</head>
	<body>

		<div class = "navbar navbar-inverse navbar-static-top">
			
			<div class = "container">

				<a href="#" class="navbar-brand" data-target=".navbar-header">Tech Site</a>

				<div class="navbar-header">

					<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
				</div>

				<div class="collapse navbar-collapse navHeaderCollapse">

					<ul class="nav navbar-nav navbar-right">

						<li class="active"><a href="index.htm">Home</a></li>
						<li><a href="#">Blog</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Social Media <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Google+</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Instagram</a></li>
							</ul>

						</li>
						<li><a href="#">About</a></li>
						<li><a href="#contact" data-toggle="modal">Contact Us</a></li>



					</ul>



				</div>

			</div>


		</div>


		<div class = "container">
               
            <div class = "jumbotron">
                 <center><h1>Hellow World !! Trial 123</h1>
		            <video id="video" autoplay></video>
<video id="otherPeer" autoplay></video>

<script>
// get a reference to our FireBase database. You should create your own
// and replace the URL.
var dbRef = new Firebase("https://burning-fire-5947.firebaseIO.com/");
var roomRef = dbRef.child("rooms");
// shims!
var PeerConnection = window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
var SessionDescription = window.mozRTCSessionDescription || window.RTCSessionDescription;
var IceCandidate = window.mozRTCIceCandidate || window.RTCIceCandidate;
navigator.getUserMedia = navigator.getUserMedia || navigator.mozGetUserMedia || navigator.webkitGetUserMedia;
// generate a unique-ish string
function id () {
return (Math.random() * 10000 + 10000 | 0).toString();
}
// a nice wrapper to send data to FireBase
function send (room, key, data) {
roomRef.child(room).child(key).set(data);
}
// wrapper function to receive data from FireBase
function recv (room, type, cb) {
roomRef.child(room).child(type).on("value", function (snapshot, key) {
var data = snapshot.val();
if (data) { cb(data); }
});
}
// generic error handler
function errorHandler (err) {
console.error(err);
}
// determine what type of peer we are,
// offerer or answerer.
var ROOM = location.hash.substr(1);
var type = "answerer";
var otherType = "offerer";
// no room number specified, so create one
// which makes us the offerer
if (!ROOM) {
ROOM = id();
type = "offerer";
otherType = "answerer";
document.write("<a href='#"+ROOM+"'>Send link to other peer</a>");
}

<?php
 
 $var="muhahaha";


?>
// generate a unique-ish room number
var ME = id();
// options for the PeerConnection
var server = {
iceServers: [
{url: "stun:23.21.150.121"},
{url: "stun:stun.l.google.com:19302"},
{url: "turn:numb.viagenie.ca", credential: "webrtcdemo", username: "louis%40mozilla.com"}
]
};
// for making the channel secure use DTLS
var options = {
optional: [
{DtlsSrtpKeyAgreement: true}
]
}
// create the PeerConnection
var pc = new PeerConnection(server, options);
pc.onicecandidate = function (e) {
// take the first candidate that isn't null
if (!e.candidate) { return; }
pc.onicecandidate = null;
// request the other peers ICE candidate
recv(ROOM, "candidate:" + otherType, function (candidate) {
pc.addIceCandidate(new IceCandidate(JSON.parse(candidate)));
});
// send our ICE candidate
send(ROOM, "candidate:"+type, JSON.stringify(e.candidate));
};
// grab the video elements from the document
var video = document.getElementById("video");
var video2 = document.getElementById("otherPeer");
// get the user's media, in this case just video
navigator.getUserMedia({video: true,audio: true }, function (stream) {   //make changes here for audio 

//https://developer.mozilla.org/en-US/docs/NavigatorUserMedia.getUserMedia

// set one of the video src to the stream
video.src = URL.createObjectURL(stream);                    
// add the stream to the PeerConnection
pc.addStream(stream);                                       
// now we can connect to the other peer
connect();
}, errorHandler);
// when we get the other peer's stream, add it to the second
// video element.
pc.onaddstream = function (e) {
video2.src = URL.createObjectURL(e.stream);
};
// constraints on the offer SDP. Easier to set these
// to true unless you don't want to receive either audio
// or video.
var constraints = {
mandatory: {
OfferToReceiveAudio: true,
OfferToReceiveVideo: true
}
};
// start the connection!
function connect () {
if (type === "offerer") {
// create the offer SDP
pc.createOffer(function (offer) {
pc.setLocalDescription(offer);
// send the offer SDP to FireBase
send(ROOM, "offer", JSON.stringify(offer));
// wait for an answer SDP from FireBase
recv(ROOM, "answer", function (answer) {
pc.setRemoteDescription(
new SessionDescription(JSON.parse(answer))
);
});
}, errorHandler, constraints);
} else {
// answerer needs to wait for an offer before
// generating the answer SDP
recv(ROOM, "offer", function (offer) {
pc.setRemoteDescription(
new SessionDescription(JSON.parse(offer))
);
// now we can generate our answer SDP
pc.createAnswer(function (answer) {
pc.setLocalDescription(answer);
// send it to FireBase
send(ROOM, "answer", JSON.stringify(answer));
}, errorHandler, constraints);  
}); 
}
}
</script>


<script>
var recorder = RecordRTC(mediaStream, {
   type: 'video',
   width: 320,
   height: 240
});

// start recording video
recorder.startRecording();

// stop recording video
recorder.stopRecording(function(videoURL) {
   window.open(videoURL);
});

// force saving recorded stream to disk
recorder.save();
</script>





















                </center>
			</div>
               
	    </div>







<div class = "mainContent" style="overflow:hidden">
           
            <div class = "row">
               
                <div class = "col-md-3">
                   
                   <h3><a href="#" onclick="myFunction2()">This is soo awesome!</a></h3>
                    
                  



                   <script>
                        function myFunction() {
                            document.getElementById("demo").innerHTML = location.href;
                        }
                        function myFunction2() {
                            var currentPageUrlIs = "";
                            currentPageUrlIs = location.href.toString();
                            document.getElementById("demo").innerHTML = currentPageUrlIs;
                        }
                    </script>











                    <a href = "#" onclick=### class = "btn btn-default">Read More</a>
                    
                    
                     <p class = "col-md-3" id="demo"></p>
                   
                </div>
               
                <div class = "col-md-3">
                   
                    <h3><a href = "#">This is soo awesome!</a></h3>
                    <p>Here as you can see the content displayed here would adjust to the resolution goverened by the browser window, independent of the browser the platform on which the browser is running the device or the resolution of that device. </p>
                                    <a href = "#" class = "btn btn-default">Read More</a>
                   
                </div>
               
                <div class = "col-md-3">
                   
                    <h3><a href = "#">This is soo awesome!</a></h3>
                    <p>Here as you can see the content displayed here would adjust to the resolution goverened by the browser window, independent of the browser the platform on which the browser is running the device or the resolution of that device. </p>
                                    <a href = "#" class = "btn btn-default">Read More</a>
                   
                </div>
               
                <div class = "col-md-3">
                   
                    <h3><a href = "#">This is soo awesome!</a></h3>
                    <p>Here as you can see the content displayed here would adjust to the resolution goverened by the browser window, independent of the browser the platform on which the browser is running the device or the resolution of that device. </p>
                                    <a href = "#" class = "btn btn-default">Read More</a>
                   
                </div>
               
            </div>
           
        </div>






		 <div class = "navbar navbar-default navbar-fixed-bottom">
               
            <div class = "container">
                <p class = "navbar-text pull-left">Site Built By Naman Avasthi</p>
                <a href = "http://google.com" class = "navbar-btn btn-danger btn pull-right">Subscribe on YouTube</a>
       		</div>
               
        </div>











<div class = "modal fade" id = "contact" role = "dialog">
                    <div class = "modal-dialog">
                        <div class = "modal-content">
                            <div class = "modal-header">
                                <h4>Contact Tech Site</h4>
                            </div>
                            <div class = "modal-body">
                            	<form>
                                Name   &nbsp;&nbsp;&nbsp;<input type="text" name="firstname"><br><br>
                                Email  &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email"><br><br>
                                Message &nbsp;&nbsp;&nbsp;&nbsp;<br><textarea rows="4" cols="50"></textarea>
                           		 </form>
                            </div>
                            <div class = "modal-footer">
                        <a class = "btn btn-default" data-dismiss = "modal">Close</a>    
                                <a class = "btn btn-primary" data-dismiss = "modal">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>










		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>

</html>