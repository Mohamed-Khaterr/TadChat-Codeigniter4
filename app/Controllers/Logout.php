<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Logout extends BaseController {
	
	
    public function index(){
		$this->session->destroy();
		
		return redirect()->to(base_url('Login'));
    }
	
}