/*
	WebSocket 
    Ratchet
*/

var message = document.getElementById('userMessage');


const conn = new WebSocket('ws://'+ ip +':8080?user_id='+ current_user_id);

conn.onopen = function(e){
	console.log('Connection Established!');
};

conn.onmessage = function(e) {
	if(isJSON(e.data)){
		let data = JSON.parse(e.data);

		if(data.hasOwnProperty('message')){
            addMessageToChatView(data.message, data.firstName, data.lastName);

		}else if(data.hasOwnProperty('online')){
            // All online Users
			let users = data.online;
			users.forEach(addOnlineUser);

		}else if(data.hasOwnProperty('offline')){
			// Remove user from left list
			if(document.getElementById(data.offline.resource_id))
				document.getElementById(data.offline.resource_id).remove();

		}else if(data.hasOwnProperty('type')){
            // WebRTC msg

            if(data.type == 'offer'){
                createAnswer(data.offer);
                popupModal.toggle();

            }else if(data.type == 'answer'){
                addAnswer(data.answer);

            }else if(data.type == 'ice'){
                if(peerConn){
                    peerConn.addIceCandidate(data.ice).then(function () {
                        console.log('Add ICE Candidate!');
                    }).catch(e => {
                        console.log("Failure during addIceCandidate(): " + e.name);
                    });
                }
            }
			

		}else if(data.hasOwnProperty('camera')){
            // Closing the Camera and Connection
            popupModal.hide();
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



function isJSON(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
