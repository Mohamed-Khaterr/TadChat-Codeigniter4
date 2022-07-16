<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController {
	
	
    public function index(){
		$this->showView('loginView');
    }
	
	public function handleSginin(){
		// Check for AJAX request.
		if ($this->request->isAJAX()) {
			$email = htmlspecialchars($this->request->getPost('email'));
			$password = htmlspecialchars($this->request->getPost('password'));
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				// Check user in Database
				$user = new UsersModel();
				if($result = $user->where('email', $email)->first()){
					if(password_verify($password, $result['password'])) {
						print_r('(Success:)');
						
					}else{
						print_r('Wrong Password (Error:Login)');
					}
				}else{
					print_r('There is no user with this email (Error:Login)');
				}
				
			}else{
				print_r('Invalid email (Error:Login)');
			}
		}
	}
	
	public function handleRegister(){
		// Check for AJAX request.
		if ($this->request->isAJAX()) {
			$fname = htmlspecialchars($this->request->getPost('firstName'));
			$lname = htmlspecialchars($this->request->getPost('lastName'));
			$email = htmlspecialchars($this->request->getPost('email'));
			$password = htmlspecialchars($this->request->getPost('password'));
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				$user = new UsersModel();
				// Check user in Database
				if(empty($user->where('email', $email)->first())){
					$newUser = [
						'firstName' => $fname,
						'lastName' => $lname,
						'email' => $email,
						'password' => password_hash($password, PASSWORD_DEFAULT),
					];
					
					$user->insert($newUser);
					print_r('(Success:)');
					
				}else{
					print_r('Email is alraedy exists (Error:Register)');
				}
				
			}else{
				print_r('Invalid email (Error:Register)');
			}
		}
	}
}
