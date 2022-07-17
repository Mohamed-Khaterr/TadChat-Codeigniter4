<?php

namespace App\Libraries;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use \App\Models\ConnectionModel;
use \App\Models\UsersModel;


class WebSocket implements MessageComponentInterface {
    protected $clients = array();
	protected $userModel;
	protected $connModel;
	
	function __construct() {
		$this->userModel = new UsersModel();
		$this->connModel = new ConnectionModel();
    }
	
    public function onOpen(ConnectionInterface $conn) {
		$this->clients[$conn->resourceId] = $conn;
		
		$queryString = $conn->httpRequest->getUri()->getQuery();
        parse_str($queryString, $query);
		
		if(!empty($query['user_id'])){
			$user = $this->userModel->where('id', $query['user_id'])->first();
		
			$newConn = [
				'conn_resource_id' => $conn->resourceId,
				'user_id' => $user['id'],
				'user_firstName' => $user['firstName'],
				'user_lastName' => $user['lastName'],
				'gender' => 'Male'
			];
			
			// Add Connected user to Connection tabel
			$this->connModel->insert($newConn);
			
			
			file_put_contents("webSocketErrors.txt", json_encode($this->connModel->findAll()));
			
			$onlineUser = [
				'online' => [
					'resource_id' => $conn->resourceId,
					'firstName' => $user['firstName'],
					'lastName' => $user['lastName'],
					'gender' => 'male',
				]
			];
			
			foreach ($this->clients as $client) {
				$client->send(json_encode(['online' => $this->connModel->findAll()]));
			}
		}
		
		
    }

    public function onMessage(ConnectionInterface $from, $msg) {
		
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
		$offlineUser = [
			'offline' => [
				'resource_id' => $conn->resourceId,
			]
		];
		
		foreach ($this->clients as $client) {
			$client->send(json_encode($offlineUser));
		}
		
		
		// Delete disconnected user from Connection Table
		$this->connModel->where('conn_resource_id', $conn->resourceId)->delete();
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
		file_put_contents("webSocketErrors.txt", "An error has occurred: {$e->getMessage()}\n");
		
		// Delete disconnected user from Connection Table
		$this->connModel->where('conn_resource_id', $conn->resourceId)->delete();
		
        $conn->close();
    }
}