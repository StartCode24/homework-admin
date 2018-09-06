<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	public function getGuru($where="")
	{
		$data = $this->db->query('select * from guru '.$where);
		return $data->result_array();
	}

	public function insertData($guru, $data) {
		$res = $this->db->insert($guru, $data);
		return $res;
	}

	public function updateData($guru, $data, $where) {
		$res = $this->db->update($guru, $data, $where);
		return $res;
	}

	public function deleteData($guru, $where) {
		$res = $this->db->delete($guru, $data);
		return $res;
	}
}
