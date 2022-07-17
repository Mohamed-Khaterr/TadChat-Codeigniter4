<?php 
namespace App\Models;

use CodeIgniter\Model;

class ConnectionModel extends Model{
	
	protected $table = 'connection';
	
	protected $primaryKey = 'id';
	
	protected $allowedFields = ['conn_resource_id', 'user_id', 'user_firstName', 'user_lastName'];
}