<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Chat extends BaseController {
	
	
    public function index(){
		$data = [
			'user_id' => $this->session->get('id'),
		];
		
		$this->showView('chatView', $data);
    }
	
}