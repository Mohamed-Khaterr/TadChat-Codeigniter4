
$(document).ready(function(){
	// prevent form submit from reloading page
	$('form').submit(function(e){
		e.preventDefault();
	});
});


// Login
let loginEmail = document.getElementById('loginEmail');
let loginPassword = document.getElementById('loginPassword');

// Login Pressed
document.getElementById('loginBtn').addEventListener('click', function(){
	if(!loginEmail.value){
		showErrorModal('Login', 'Please add email');
		
	}else if(!loginPassword.value){
		showErrorModal('Login', 'Please add password');
		
	}else{
		// No Errors
		let data = {
			email: loginEmail.value,
			password: loginPassword.value,
		};
		
		ajaxRequest(ajaxSignin, data);
	}
});




// Register
let registerFirstName = document.getElementById('registerFirstName');
let registerLastName = document.getElementById('registerLastName');
let registerEmail = document.getElementById('registerEmail');
let registerPassword = document.getElementById('registerPassword');
let registerRepeatPassword = document.getElementById('registerRepeatPassword');
let registerCheck = document.getElementById('registerCheck');

// Register Pressed
document.getElementById('registerBtn').addEventListener('click', function(){
	if(!registerFirstName.value){
		showErrorModal('Register', 'Please add your first name');
		
	}else if(!registerLastName.value){
		showErrorModal('Register', 'Please add your last name');
		
	}else if(!registerEmail.value){
		showErrorModal('Register', 'Please add your email');
		
	}else if(!registerPassword.value){
		showErrorModal('Register', 'Please add your password');
		
	}else if(!registerRepeatPassword.value){
		showErrorModal('Register', 'Please repeate the password');
		
	}else if(registerRepeatPassword.value !== registerPassword.value){
		showErrorModal('Register', 'Password dose not match with Repeat paswword');
		
	}else if(registerCheck.checked == false){
		showErrorModal('Register', 'You can not Register without agree to the terms');
		
	}else{
		// No Errors
		let data = {
			firstName: registerFirstName.value,
			lastName: registerLastName.value,
			email: registerEmail.value,
			password: registerRepeatPassword.value,
		};
		
		ajaxRequest(ajaxRegister, data);
	}
});






function showErrorModal(title, message){
	const popupModal = new mdb.Modal(document.getElementById('popupModal'));
	
	// Error Elements
	let errorTitle = document.getElementById('errorTitle');
	let errorMessage = document.getElementById('errorMessage');
	
	errorTitle.innerHTML = title;
	errorMessage.innerHTML = message;
	popupModal.toggle();
}