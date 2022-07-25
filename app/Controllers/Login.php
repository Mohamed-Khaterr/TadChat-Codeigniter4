<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController {
	
	
    public function index(){
		$this->showView('loginView');
    }



    /*
    |--------------------------------------------------------------------
    |  Handling AJAX Request
    |--------------------------------------------------------------------
    */

    // Handle Singin In ::Check User
	public function handleSginin(){
        $response = ['method' => 'login', 'error' => ''];

		// Check for AJAX request.
		if ($this->request->isAJAX()) {
			$email = htmlspecialchars($this->request->getPost('email'));
			$password = htmlspecialchars($this->request->getPost('password'));
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				
				$user = new UsersModel();
				
				// Check user in Database
				if($result = $user->where('email', $email)->first()){
					if(password_verify($password, $result['password'])) {
						$userInfo = [
							'id' => $result['id'],
							'firstName' => $result['firstName'],
							'lastName' => $result['lastName'],
							'email' => $result['email'],
							'avatar' => $result['avatar'],
							'isLoggedIn' => true,
						];
						
						// Set Sessions
						$this->session->set($userInfo);
						
					}else{
						// password_verify -> False
                        $response['error'] = 'Wrong Password';
                        
					}
				}else{
					// $result -> False
                    $response['error'] = 'There is no user with this email';
				}
				
			}else{
				// filter_var -> False
                $response['error'] = 'Invalid email';
			}

            
                
            return $this->response
                        ->setJSON($response);
            
		}
	}
	

    // Handl Register ::Creating User
	public function handleRegister(){
        $response = ['method' => 'register', 'error' => ''];

		// Check for AJAX request.
		if ($this->request->isAJAX()) {
			$fname = htmlspecialchars($this->request->getPost('firstName'));
			$lname = htmlspecialchars($this->request->getPost('lastName'));
			$email = htmlspecialchars($this->request->getPost('email'));
			$password = htmlspecialchars($this->request->getPost('password'));
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				
				$userModel = new UsersModel();
				
				// Check user in Database
				if(empty($userModel->where('email', $email)->first())){
					$newUser = [
						'firstName' => $fname,
						'lastName' => $lname,
						'email' => $email,
						'password' => password_hash($password, PASSWORD_DEFAULT),
					];
					
					// Save new user to Database
					$userModel->insert($newUser);
					
					// Delete password from array
					unset($newUser['password']);
					
					// new Element to Sessions
					$newUser['id'] = $userModel->getInsertID();
					$newUser['isLoggedIn'] = true;
					
					// Set Sessions
					$this->session->set($newUser);
					
				}else{
					// empty -> False
                    $response['error'] = 'Email is alraedy exists';
				}
				
			}else{
				// filter_var -> False
                $response['error'] = 'Invalid email';
			}

            return $this->response
                        ->setJSON($response);
		}
	}
}
