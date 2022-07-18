
<style>

@media only screen and (max-height: 750px) {
    .chat-messages {
        height: 500px;
    }
}

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
                                <button id="callVideo1" class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
								<button id="logout" type="button" class="btn btn-light border btn-lg px-3" width="24" height="24"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>

					<div class="position-relative">
						
						<div id="chatMessages" class="chat-messages p-4">
							
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
							
						</div>
					</div>

					<div class="flex-grow-0 py-3 px-4 border-top">
						<div class="input-group">
                            <div class="myBtn"><button type="button" id="callVideo2" class="btn btn-primary">Call</button></div>
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
<div class="modal top fade" id="popupModal" tabindex="-1" aria-labelledby="popupModal" aria-hidden="true" data-mdb-backdrop="false" data-mdb-keyboard="true">
	<div class="modal-dialog modal-fullscreen  modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="errorTitle">Stream</h5>
				<button id="modalClose" type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<div id="modalBody" class="modal-body">
				<!-- BODY -->
                <div style="display: grid; grid-template-columns: 1fr; grid-template-rows: 1fr; grid-area: overlap;">
                    <video id="remoteVideoStream" width="100%" height="70%" autoplay="true" poster="https://i.pinimg.com/originals/49/23/29/492329d446c422b0483677d0318ab4fa.gif" style="grid-area: overlap; left: 0; position: fixed; border-radius: 30px;"></video>

                    <video id="localVideoStream" width="300px" height="225px" autoplay="true" poster="<?= base_url('img/loading.gif') ?>" style="grid-area: overlap; left: 15px; position: fixed; border-radius: 30px;"></video>
                </div>
			</div>
			
			<div class="modal-footer">
				<button id="modalClose" type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<script type="text/javascript" >
<?php 
    // iPhone
    if(empty($user_id)){
        $user_id = 5;
        $firstName = 'iPhone';
        $lastName = '6s';
    } 
?>

const current_user_id = '<?= $user_id ?>';
const current_firstName = '<?= $firstName ?>';
const current_lastName = '<?= $lastName ?>';

const popupModal = new mdb.Modal(document.getElementById('popupModal'));

// Page is Loaded
$(document).ready(function() {
	// Auto Scroll to bottom of page
	$("html, body").animate({ 
        scrollTop: $(document).height() 
    }, 500);
	
	// Auto Scroll to bottom of Chat
    scrollToBottomChat()
});

function scrollToBottomChat(){
	// Scroll to bottom of Chat
	$("#chatMessages").animate({
		scrollTop: $('#chatMessages').get(0).scrollHeight
	}, 1000);
}

// Up Button Call Pressed
document.getElementById('callVideo1').addEventListener('click', function() {
	createOffer();
	popupModal.toggle();
});

// Down Button Call Pressed
document.getElementById('callVideo2').addEventListener('click', function() {
	createOffer();
	popupModal.toggle();
});

// Logout Pressed
document.getElementById('logout').addEventListener("click", function(){
	// Navigate to Home Page
	window.location.replace("<?= base_url('logout') ?>");
});


// Show Message in Chat
function addMessageToChatView(message, user_firstName=null, user_lastName=null){
    let current = new Date();
    let chat = document.getElementById('chatMessages');
    var html;

    if(user_firstName != null && user_lastName != null){
        // Ohter users messages
        html = '<div class="chat-message-left pb-4"><div><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40"><div class="text-muted small text-nowrap mt-2">'+ current.toLocaleTimeString().replace(/(.*)\D\d+/, '$1') +'</div></div><div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3"><div class="font-weight-bold mb-1" style="min-width: 130px;">'+ user_firstName + ' ' + user_lastName +'</div>'+ message +'</div></div>';
        
        chat.innerHTML += html;
        
    }else{
        // Current user Messages
        html = '<div class="chat-message-right mb-4"><div><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40"><div class="text-muted small text-nowrap mt-2">'+ current.toLocaleTimeString().replace(/(.*)\D\d+/, '$1') +'</div></div><div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3"><div class="font-weight-bold mb-1">You</div>'+ message +'</div>	</div>';

        chat.innerHTML += html;
    }

    scrollToBottomChat();
}

// Add online user to table list on left
function addOnlineUser(user){

	let genderImage;

	if(user.gender == 'Male')
        genderImage = "https://bootdey.com/img/Content/avatar/avatar4.png";
	else
        genderImage = "https://bootdey.com/img/Content/avatar/avatar3.png";
	

	let isMe;
	if(user.user_id == current_user_id){isMe = "(me)"} else {isMe = ""}
		
	
	let html = '<tr id="'+ user.conn_resource_id +'"><td><a href="" class="list-group-item list-group-item-action border-0"><div class="d-flex align-items-start"><img src="'+ genderImage +'" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40"><div class="flex-grow-1 ml-3">'+ user.user_firstName + " " +  user.user_lastName + " " + isMe +'<div class="small"><span class="fas fa-circle chat-online"></span> Online</div></div></div></a></td></tr>';
	
	if(!document.getElementById(user.conn_resource_id)){
		document.getElementById('onlineUsers').innerHTML += html;
	}
}


// Current User Send Message
document.getElementById('sendBtn').addEventListener("click", function(){
	if(message.value != null && message.value != ''){
        // Add Message to Chat
        addMessageToChatView(message.value)
		
        // Send Message to other users
		let data = {
			message: message.value,
			firstName: "<?= $firstName ?>",
			lastName: "<?= $lastName ?>",
		};
		conn.send(JSON.stringify(data));
		
		message.value = null;
	}
});
</script>

<script src="/js/websocket.js"></script>
<script src="/js/webrtc.js"></script>