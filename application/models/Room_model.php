<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {

	public function getRoom($where="")
	{
		$data = $this->db->query('select * from room '.$where);
		return $data->result_array();
	}

	public function insertData($room, $data){
		$res = $this->db->insert($room, $data);
		return $res;
	}

	public function updateData($room, $data, $where){
		$res = $this->db->update($room, $data, $where);
		return $res;
	}

	public function deleteData($room, $where){
		$res = $this->db->delete($room, $where);
		return $res;	
	}
}
