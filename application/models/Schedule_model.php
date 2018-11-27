<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schedule_model extends CI_Model {

	public function getSchedule($where="")
	{
		$data = $this->db->query('select * from schedule '.$where);
		return $data;
	}

	public function insertData($schedule, $data){
		$res = $this->db->insert($schedule, $data);
		return $res;
	}

	public function updateData($schedule, $data, $where){
		$res = $this->db->update($schedule, $data, $where);
		return $res;
	}

	public function deleteData($schedule, $where){
		$res = $this->db->delete($schedule, $where);
		return $res;	
	}
}
