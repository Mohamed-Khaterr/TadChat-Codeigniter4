<?php

namespace App\Controllers;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Libraries\WebSocket;


class Server extends BaseController{
	
	public function index(){
		
		if(!is_cli())
			die('Something went wrong!');
		
		$server = IoServer::factory(
			new HttpServer(
				new WsServer(
					new WebSocket()
				)
			),
			8080
		);
		
		// Run WebSocket
		$server->run();
	}
}