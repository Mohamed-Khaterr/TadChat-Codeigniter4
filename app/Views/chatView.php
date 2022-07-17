
<style>

::-webkit-scrollbar{
	width: 12px;
	background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb {
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
	background-color: #C9C9CA; 
}
::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
	background-color: #F5F5F5;
	border-radius: 10px; 
}

body{margin-top:20px;}

.chat-online {
    color: #34ce57
}

.chat-offline {
    color: #e4606d
}

.chat-messages {
    display: flex;
    flex-direction: column;
    height: 600px;
    overflow-y: scroll;
	background-color: #E2E2E4;
    border-radius: 25px;
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}
.py-3 {
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.flex-grow-1 {
    margin-left: 10px;
}
.flex-shrink-1{
	margin-left: 3%;
	margin-right: 3%;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
}

</style>
<div class="scrollbar scrollbar-secondary">
          <div class="force-overflow"></div>
        </div>

<main class="content">
    <div class="container p-0">

		<h1 class="h3 mb-3">Messages</h1>

		<div class="card">
			<div class="row g-0">
				<div class="col-12 col-lg-5 col-xl-3 border-right">
					<table id="onlineUsers">
						<tr>
							<th>
								<div class="px-4 d-none d-md-block">
									<div class="d-flex align-items-center">
										<div class="flex-grow-1">
											<input type="text" class="form-control my-3" placeholder="Search...">
										</div>
									</div>
								</div>
							</th>
						</tr>
						
						

						<hr class="d-block d-lg-none mt-1 mb-0">
					
					</table>
				</div>
				<div class="col-12 col-lg-7 col-xl-9">
					<div class="py-2 px-4 border-bottom d-none d-lg-block">
						<div class="d-flex align-items-center py-1">
							<div class="position-relative">
								<!--<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">-->
							</div>
							<div class="flex-grow-1 pl-3">
								<strong>Chat</strong>
								<div class="text-muted small"><em>Online...</em></div>
							</div>
							<div>
								<button id="callPhone" class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
								<button id="callVideo" class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
								<button id="logout" type="button" class="btn btn-light border btn-lg px-3" width="24" height="24"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>

					<div class="position-relative">
						
						<div id="chatMessages" class="chat-messages p-4">
							<!--
							<div class="chat-message-right pb-4">
								<div>
									<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">2:33 am</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">You</div>
									Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
								</div>
							</div>

							<div class="chat-message-left pb-4">
								<div>
									<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">2:34 am</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1">Sharon Lessman</div>
									Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
								</div>
							</div>
							-->
						</div>
					</div>

					<div class="flex-grow-0 py-3 px-4 border-top">
						<div class="input-group">
							<input id="userMessage" type="text" class="form-control" placeholder="Type your message">
							<button type="button" id="sendBtn" class="btn btn-primary">Send</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>






<!-- Modal -->
<div class="modal top fade" id="popupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="false" data-mdb-keyboard="true">
  <div class="modal-dialog modal-sm  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorTitle">Login</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="errorMessage" class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>







<script type="text/javascript" >
// Logout Pressed
document.getElementById('logout').addEventListener("click", function(){
	// Navigate to Home Page
	window.location.replace("<?= base_url('logout') ?>");
});

$( document ).ready(function() {
	// Auto Scroll to bottom of page
	$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	
	// Auto Scroll to bottom of Chat
	var chat = document.getElementById('chatMessages');
	chat.scrollTop = chat.scrollHeight;
});

function scrollChat(){
	// Scroll to bottom of Chat
	$("#chatMessages").animate({
		scrollTop: $('#chatMessages').get(0).scrollHeight
	}, 2000);
}

function isJSON(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
</script>

<script type="text/javascript" >
// WebSocket
const conn = new WebSocket('ws://192.168.1.6:8080?user_id=<?= $user_id ?>');

conn.onopen = function(e){
	console.log('Connection Established!');
};

conn.onmessage = function(e) {
	// console.log(e.data);
	if(isJSON(e.data)){
		let data = JSON.parse(e.data);
		if(data.hasOwnProperty('isMessage')){
			scrollChat();
			showOtherMessage(data.body, data.firstName + " " + data.lastName);
		}else if(data.hasOwnProperty('online')){
			let user = data.online;
			// addOnlineUser(user);
			user.forEach(addOnlineUser);
		}else if(data.hasOwnProperty('offline')){
			// Remove user from left list
			if(document.getElementById(data.offline.resource_id))
				document.getElementById(data.offline.resource_id).remove();
		}
		
	}
};

conn.onclose = function(e) {
	console.log('Connection is Closed!');
};

conn.onerror = function(error) {
	console.log(error);
	console.log('Error!: ', error.message);
};

</script>

<script type="text/javascript" >
// Working with UI
var message = document.getElementById('userMessage');

document.getElementById('sendBtn').addEventListener("click", function(){
	if(message.value != null && message.value != ''){
		// User Send Message
		// console.log(message.value);
		
		showMyMessage(message.value);
		scrollChat();
		
		let data = {
			isMessage: true,
			body: message.value,
			firstName: "<?= $firstName ?>",
			lastName: "<?= $lastName ?>",
		};
		
		conn.send(JSON.stringify(data));
		
		message.value = null;
	}
});


function showMyMessage(message){
	// Show local Message in Chat chatMessages
	let current = new Date();
	
	let html = '<div class="chat-message-right mb-4">		<div>			<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">			<div class="text-muted small text-nowrap mt-2">'+ current.toLocaleTimeString().replace(/(.*)\D\d+/, '$1') +'</div>		</div>		<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">			<div class="font-weight-bold mb-1">You</div>'+ message +'</div>	</div>';
	
	document.getElementById('chatMessages').innerHTML += html;
}

function showOtherMessage(message, userName){
	// Show remote Message in Chat chatMessages
	let current = new Date();
	
	let html = '<div class="chat-message-left pb-4"><div><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40"><div class="text-muted small text-nowrap mt-2">'+ current.toLocaleTimeString().replace(/(.*)\D\d+/, '$1') +'</div></div><div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3"><div class="font-weight-bold mb-1">'+ userName +'</div>'+ message +'</div></div>';
	
	document.getElementById('chatMessages').innerHTML += html;
}

function addOnlineUser(user){
	let imageLink;
	if(user.gender == 'Male')
		imageLink = "https://bootdey.com/img/Content/avatar/avatar4.png";
	else
		imageLink = "https://bootdey.com/img/Content/avatar/avatar3.png";
	
	let isMe;
	if(user.user_firstName == "<?= $firstName ?>" && user.user_lastName == "<?= $lastName ?>")
		isMe = "(me)";
	else
		isMe = ""
	
	let html = '<tr id="'+ user.conn_resource_id +'"><td><a href="" class="list-group-item list-group-item-action border-0"><div class="d-flex align-items-start"><img src="'+ imageLink +'" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40"><div class="flex-grow-1 ml-3">'+ user.user_firstName + " " +  user.user_lastName + " " + isMe +'<div class="small"><span class="fas fa-circle chat-online"></span> Online</div></div></div></a></td></tr>';
	
	if(!document.getElementById(user.conn_resource_id)){
		document.getElementById('onlineUsers').innerHTML += html;
	}
}

</script>







<script type="text/javascript" >
/*
	WebRTC -----------------------------------------------------
*/

let play = document.getElementById('callPhone');
let pause = document.getElementById('callVideo');
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
			// send ice candidate
		}else{
			console.log("Error: No ICE Candiate!");
		}
	};
}

</script>