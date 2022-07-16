<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>
</head>
<body>
<div style='text-align: center;'>
	<h3>Video</h3>
	<video id='video' width="320" height="240" autoplay ></video>
<div>

<div id='buttons'>
	<button id='play'>Play</button>
	<button id='pause'>Pause</button>
</div>

</body>

<script>
let play = document.getElementById('play');
let pause = document.getElementById('pause');
let video = document.getElementById('video');

let peerConn;

// STUN and TRUN servers
var servers= {
	iceServers: [
		{
		  urls: [
			'stun:stun2.l.google.com:19302',
			'stun:stun3.l.google.com:19302',
		  ]
		},
		{
			url: 'turn:numb.viagenie.ca',
			credential: 'muazkh',
			username: 'webrtc@live.com'
		},
		{
			url: 'turn:192.158.29.39:3478?transport=udp',
			credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
			username: '28224511:1379330808'
		},
		{
			url: 'turn:192.158.29.39:3478?transport=tcp',
			credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
			username: '28224511:1379330808'
		},
		{
			url: 'turn:turn.bistri.com:80',
			credential: 'homeo',
			username: 'homeo'
		 },
		 {
			url: 'turn:turn.anyfirewall.com:443?transport=tcp',
			credential: 'webrtc',
			username: 'webrtc'
		}
	]
}

play.addEventListener('click', function() {
	createOffer();
})
pause.addEventListener('click', function() {
	video.srcObject = null;
})

async function createOffer(){
	peerConn = new RTCPeerConnection(servers);
	
	const stream = await navigator.mediaDevices.getUserMedia({video: true, audio: false});
	for (const track of stream.getTracks()) {
		peerConn.addTrack(track, stream);
	}
	video.srcObject = stream;
	
	
	let offer = await peerConn.createOffer();
	await peerConn.setLocalDescription(offer);
	
	// then Send this offer
	
	console.log(offer);
	
	getICECandidate(peerConn);
}

async function getICECandidate(peer){
	peer.onicecandidate = async function(e){
		if(e.candidate){
			let ice = await e.candidate;
			console.log('New ICE Candidate:', ice)
		}else{
			console.log("Error: No ICE Candiate!");
		}
	};
}

</script>
</html>