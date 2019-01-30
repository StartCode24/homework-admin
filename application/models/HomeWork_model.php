<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homework_model extends CI_Model {

	public function getHomeWork($where="")
	{
		$data = $this->db->query('select * from homework '.$where);
		return $data;
	}

	public function insertData($homeWork, $data){
		$res = $this->db->insert($homeWork, $data);
		return $res;
	}

	public function updateData($homeWork, $data, $where){
		$res = $this->db->update($homeWork, $data, $where);
		return $res;
	}

	public function deleteData($homeWork, $where){
		$res = $this->db->delete($homeWork, $where);
		return $res;	
	}
}
