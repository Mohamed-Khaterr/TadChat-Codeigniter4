

<div class="login-and-register">


		<!-- Pills navs -->
		<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
		  <li class="nav-item" role="presentation">
			<a
			  class="nav-link active"
			  id="tab-login"
			  data-mdb-toggle="pill"
			  href="#pills-login"
			  role="tab"
			  aria-controls="pills-login"
			  aria-selected="true"
			  >Login</a
			>
		  </li>
		  <li class="nav-item" role="presentation">
			<a
			  class="nav-link"
			  id="tab-register"
			  data-mdb-toggle="pill"
			  href="#pills-register"
			  role="tab"
			  aria-controls="pills-register"
			  aria-selected="false"
			  >Register</a
			>
		  </li>
		</ul>
		<!-- Pills navs -->

		<!-- Pills content -->
		<div class="tab-content">
		  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
			<form method="POST"><?= csrf_field() ?>
				<p class="text-center">Sign in</p>
				

			  <!-- Email input -->
			  <div class="form-outline mb-4">
				<input type="email" id="loginEmail" class="form-control"  />
				<label class="form-label" for="loginEmail">Email</label>
			  </div>

			  <!-- Password input -->
			  <div class="form-outline mb-4">
				<input type="password" id="loginPassword" class="form-control"  />
				<label class="form-label" for="loginPassword">Password</label>
			  </div>

			  <!-- 2 column grid layout -->
			  <div class="row mb-4">
				<div class="col-md-6 d-flex justify-content-center">
				  <!-- Checkbox -->
				  <div class="form-check mb-3 mb-md-0">
					<input class="form-check-input" type="checkbox" value="" id="loginCheck" />
					<label class="form-check-label" for="loginCheck"> Remember me </label>
				  </div>
				</div>

				<div class="col-md-6 d-flex justify-content-center">
				  <!-- Simple link -->
				  <a href="">Forgot password?</a>
				</div>
			  </div>

			  <!-- Submit button -->
			  <button type="submit" id="loginBtn" class="btn btn-primary btn-block mb-4">Sign in</button>
			</form>
		  </div>
		  
		  
		  
		  
		  
		  
		  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
			<form method="POST"><?= csrf_field() ?>

			  <p class="text-center">Sign up</p>

			  <!-- First Name input -->
			  <div class="form-outline mb-4">
				<input type="text" id="registerFirstName" class="form-control"  />
				<label class="form-label" for="registerName">First Name</label>
			  </div>

			  <!-- Last Name input -->
			  <div class="form-outline mb-4">
				<input type="text" id="registerLastName" class="form-control"  />
				<label class="form-label" for="registerLastName">Last Name</label>
			  </div>

			  <!-- Email input -->
			  <div class="form-outline mb-4">
				<input type="email" id="registerEmail" class="form-control"  />
				<label class="form-label" for="registerEmail">Email</label>
			  </div>

			  <!-- Password input -->
			  <div class="form-outline mb-4">
				<input type="password" id="registerPassword" class="form-control"  />
				<label class="form-label" for="registerPassword">Password</label>
			  </div>

			  <!-- Repeat Password input -->
			  <div class="form-outline mb-4">
				<input type="password" id="registerRepeatPassword" class="form-control"  />
				<label class="form-label" for="registerRepeatPassword">Repeat password</label>
			  </div>

			  <!-- Checkbox -->
			  <div class="form-check d-flex justify-content-center mb-4">
				<input
				  class="form-check-input me-2"
				  type="checkbox"
				  value=""
				  id="registerCheck"
				  
				  aria-describedby="registerCheckHelpText"
				/>
				<label class="form-check-label" for="registerCheck">
				  I have read and agree to the terms
				</label>
			  </div>

			  <!-- Submit button -->
			  <button type="submit" id="registerBtn" class="btn btn-primary btn-block mb-3">Sign up</button>
			  
			</form>
		  </div>
		</div>
		<!-- Pills content -->



</div>

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

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<script type="text/javascript" >

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
			"<?= csrf_token() ?>": "<?= csrf_hash() ?>",
			email: loginEmail.value,
			password: loginPassword.value,
		};
		
		ajaxRequest("<?= site_url('/handleSginin') ?>", data);
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
			"<?= csrf_token() ?>": "<?= csrf_hash() ?>",
			firstName: registerFirstName.value,
			lastName: registerLastName.value,
			email: registerEmail.value,
			password: registerRepeatPassword.value,
		};
		
		ajaxRequest("<?= site_url('handleRegister') ?>", data);
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


function ajaxRequest(url, data){
	$.ajax({
		method: 'POST',
		url: url,
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		data: data,
		success: function (response){
			console.log(response);
			if(response.includes('(Error:Login)')){
				showErrorModal('Login', response.replace('(Error:Login)',''));
				
				
			}else if(response.includes('(Error:Register)')){
				showErrorModal('Register', response.replace('(Error:Register)',''));
				
			}else if(response.includes('(Success:)')){
				// Navigate to Chat Page
				window.location.replace("<?= site_url('chat') ?>");
			}
		}
	});
}

</script>