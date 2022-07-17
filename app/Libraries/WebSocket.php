<?php

namespace App\Libraries;
// use CodeIgniter\Controller;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


class WebSocket implements MessageComponentInterface {
    protected $clients;
	protected $users = array();
	
    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
		$this->users[$conn->resourceId] = $conn;
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
		file_put_contents("webSocketErrors.txt", "An error has occurred: {$e->getMessage()}\n");
		
		
        $conn->close();
    }
}