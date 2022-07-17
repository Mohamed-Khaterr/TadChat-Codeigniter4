<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Chat extends BaseController {
	
	
    public function index(){
		$data = [
			'user_id' => $this->session->get('id'),
			'firstName' => $this->session->get('firstName'),
			'lastName' => $this->session->get('lastName'),
		];
		
		$this->showView('chatView', $data);
    }
	
}