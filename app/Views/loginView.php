

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



<script>
    const ajaxSignin = "<?= base_url('handleSginin') ?>";
    const ajaxRegister = "<?= base_url('handleRegister') ?>";
    const chatLocation = "<?= site_url('chat') ?>";
</script>

<!-- MDB -->
<script type="text/javascript" src="<?= base_url('js/mdb.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/login.js') ?>"></script>

<script type="text/javascript" >
// This function must be here so AJAX can work
function ajaxRequest(url, data){
    let dataWithTokent = {"<?= csrf_token() ?>": "<?= csrf_hash() ?>"};

	$.ajax({
		method: 'POST',
		url: url,
		headers: {'X-Requested-With': 'XMLHttpRequest'},
        // Add user Data with tokent data
		data: Object.assign(dataWithTokent, data),

		success: function (response){
			console.log(response);
			if(response.includes('(Error:Login)')){
				showErrorModal('Login', response.replace('(Error:Login)',''));
				
				
			}else if(response.includes('(Error:Register)')){
				showErrorModal('Register', response.replace('(Error:Register)',''));
				
			}else if(response.includes('(Success:)')){
				// Navigate to Chat Page
				window.location.replace(chatLocation);
			}
		}
	});
}
</script>