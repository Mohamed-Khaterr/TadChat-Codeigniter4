/*
	WebRTC
    Peer to Peer Connection
*/

let remoteVideo = document.getElementById('remoteVideoStream');
let localVideo = document.getElementById('localVideoStream');
remoteVideo.autoplay, localVideo.autoplay = true;

let peerConn;
let stream;

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

servers = {'iceServers': [{'urls': 'stun:stun.l.google.com:19302'}]}

// When you call this function do not forget to add await: await peerConn() or ICE Candidate wont gather
async function peerConnection(){
    peerConn = new RTCPeerConnection(servers);

    stream = await navigator.mediaDevices.getUserMedia({video: true, audio: false});
    stream.getTracks().forEach(function(track){
        peerConn.addTrack(track, stream);
    });
    
    localVideo.srcObject = stream;

    peerConn.ontrack = async function(e) {
        remoteVideo.srcObject = e.streams[0];
    }

    peerConn.onicecandidate = function(e){
		if(e.candidate){
			console.log('New ICE Candidate!');
			// Send ICE Candidate to other Peer
			conn.send(JSON.stringify({type: 'ice', ice: e.candidate.toJSON()}));
		}
	};
}

// Local Client
async function createOffer(){
    await peerConnection();

	let offer = await peerConn.createOffer();

	await peerConn.setLocalDescription(offer).then(function () {
        console.log('Offer Set Local Description');
        // Then Send this offer
	    conn.send(JSON.stringify({type: 'offer', offer: offer.toJSON()}));
    });

    
    
}

// Local Client
async function addAnswer(remoteAnswer){
    let answer;
    if(remoteAnswer instanceof RTCSessionDescription){
        answer = remoteAnswer;
    }else{
        answer = new RTCSessionDescription();
        answer.type = remoteAnswer.type
        answer.sdp = remoteAnswer.sdp
    }

    if(!peerConn.currentRemoteDescription){
        peerConn.setRemoteDescription(answer).then(function () {
            console.log('Answer Set Remote Description!');
        });
    }
}

// Remote Client
async function createAnswer(remoteOffer){
    await peerConnection();

    let offer;
    if(remoteOffer instanceof RTCSessionDescription){
        offer = remoteOffer;
    }else{
        offer = new RTCSessionDescription();
        offer.type = remoteOffer.type
        offer.sdp = remoteOffer.sdp
    }

    await peerConn.setRemoteDescription(offer).then(function (){
        console.log('Offer Set Remote Description');
    });
    

    let answer = await peerConn.createAnswer();
    await peerConn.setLocalDescription(answer).then(function (){
        console.log('Answer Set Local Description');
        conn.send(JSON.stringify({type: 'answer', answer: answer.toJSON()}));
    });
}


async function addRemoteIceCandidate(remoteIceCandidate){
    let candidate;

    if(remoteIceCandidate instanceof RTCIceCandidate ){
        candidate = remoteIceCandidate
    }else{
        candidate = new RTCIceCandidate({
            candidate: remoteIceCandidate.candidate,
            sdpMid: remoteIceCandidate.sdpMid,
            sdpMLineIndex: remoteIceCandidate.sdpMLineIndex,
        });
    }

    if(peerConn){
        await peerConn.addIceCandidate(remoteIceCandidate).then(function () {
            console.log('Add ICE Candidate!');
        }).catch(e => {
            console.log("Failure during addIceCandidate(): " + e);
        });
    }

    peerConn.onconnectionstatechange = (ev) => {
        console.log("Connection State: ", peerConn.connectionState)
    };
}


// when popupModel is closed this method is called
// Closeing WebRtC
$('#popupModal').on('hidden.bs.modal', function (e) {
    if(peerConn){
        peerConn.close();
        peerConn = null;
        console.log('Close WebRTC');
    }

    if(stream){
        stream.getTracks().forEach(function(track) {
           track.stop();
        });
        stream = null;
    }

    // Send to other users to Close there Camera
    conn.send(JSON.stringify({camera: false}));
});