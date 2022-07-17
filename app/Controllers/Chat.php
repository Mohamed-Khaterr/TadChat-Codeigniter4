<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Chat extends BaseController {
	
	
    public function index(){
		$this->showView('chatView');
    }
	
}